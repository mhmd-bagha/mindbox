<?php
require DIR_ROOT . 'vendor/autoload.php';

require DIR_ROOT . 'vendor/api-file-uploader/api-file-uploader/uploader/Uploader.php';

use Response\Response as response;
use Uploader\Uploader as file_uploader;

class account extends Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!Model::SessionGet('user')) Model::redirect('login');
        $this->scripts_path = ['js/app.js'];
    }

    public function index()
    {
        $this->isUser();
        $this->title = 'پنل کاربری';
        $get_user = $this->model->find('user_email', $this->model->decrypt(Model::SessionGet('user')));
        $register_you_history = $this->register_you_history($get_user->create_time);
        $count_my_course = $this->count_my_course();
        $count_my_ticket = $this->model->count_my_ticket($get_user->id, 'user');
        $this->view('profile/index', compact('register_you_history', 'count_my_course', 'get_user', 'count_my_ticket'));
    }

    public function edit()
    {
        $this->isUser();
        $this->title = 'ویرایش پروفایل';
        $this->view('profile/user-edit-profile');
    }

    public function change_password()
    {
        $this->isUser();
        $this->title = 'تغییر رمز عبور';
        $this->view('profile/user-change-password');
    }

    public function wallet()
    {
        $isUser = $this->isUser();
        $this->title = 'کیف پول';
        $wallet_payment = $this->model->wallet_payment('user_wallet', $isUser->id);
        $this->view('profile/user-wallet', compact('wallet_payment'));
    }

    public function my_courses()
    {
        $this->isUser();
        $this->title = 'دوره های من';
        $my_courses = [];
        $get_user = $this->model->find('user_email', $this->model->decrypt(Model::SessionGet('user')));
        $my_courses_factors = $this->model->my_courses_factor($get_user->id);
        foreach ($my_courses_factors as $courses_factor) {
            $courses_factor = explode(',', $courses_factor->courses_id);
            for ($i = 0; $i < count($courses_factor); $i++) {
                $my_courses[] = $this->model->my_course($courses_factor[$i]);
            }
        }
        $this->view('profile/user-my-courses', compact('my_courses'));
    }

    public function factors()
    {
        $this->isUser();
        $this->scripts_path = ['vendor/lozad/lozad.min.js'];
        $this->title = 'فاکتورها';
        $get_user = $this->model->find('user_email', $this->model->decrypt(Model::SessionGet('user')));
        $my_factors = $this->model->my_factors($get_user->id);
        $this->view('profile/user-factors', compact('my_factors'));
    }

    public function tickets()
    {
        $this->isUser();
        $this->title = 'تیکت‌ها';
        $get_user = $this->model->find('user_email', $this->model->decrypt(Model::SessionGet('user')));
        $tickets_all = $this->model->tickets_all($get_user->id);
        $this->view('profile/user-tickets', compact('tickets_all'));
    }

    public function ticket(int $id = null)
    {
        $this->isUser();
        if (empty($id)) Model::error404();
        $id = $this->model->security($id);
        $get_ticket = $this->model->where('tickets', 'id', $id);
        $chat_ticket = $this->model->chat_ticket($id);
        $this->title = " تیکت {$get_ticket->ticket_title}";
        $this->view('profile/user-ticket', compact('chat_ticket', 'get_ticket'));
    }

    public function add_ticket()
    {
        $this->isUser();
        $this->title = 'ایجاد تیکت';
        $this->view('profile/user-add-ticket');
    }

    public function logout()
    {
        Model::SessionRemove('user');
        Model::redirect('');
    }

    protected function register_you_history($time_register)
    {
        $time_register = explode(' ', $time_register)[0];
        $time_register = date_create(Model::jaliliToMiladi($time_register));
        $time_now = date_create(date('Y-m-d', time()));
        $diff = date_diff($time_register, $time_now);
        return $diff->days;
    }

    public function count_my_course()
    {
        $count_all = 0;
        $get_user = $this->model->find('user_email', $this->model->decrypt(Model::SessionGet('user')));
        $user_id = $get_user->id;
        $status = 'paid';
        $my_courses = $this->model->count_my_course($user_id, $status);
        if ($my_courses) {
            foreach ($my_courses as $my_course) {
                $count_course = explode(',', $my_course->courses_id);
                $count_all += count($count_course);
            }
            return $count_all;
        }
    }

    public function ticket_add()
    {
        if (isset($_POST['btn_ticket'])) {
            $data = $_POST;
            $file_uploader = new file_uploader();
            $ticket_title = $this->model->security($data['ticket_title']);
            $ticket_description = $this->model->security($data['ticket_description']);
            $user_id = $this->model->security($data['user_id']);
            $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
            $ip = $_SERVER['REMOTE_ADDR'];
            $ticket_type = 'user';
            $ticket_status = 'waiting';
            if (isset($ticket_title, $ticket_description) && !empty($ticket_title) && !empty($ticket_description)) {
                if (isset($_FILES['ticket_image']['name']) && !empty($_FILES['ticket_image']['name'])) {
                    $data_file = $_FILES['ticket_image'];
                    $ticket_img_name = $data_file['name'];;
                    $ticket_img_tmp = $data_file['tmp_name'];
                    $ticket_img_size = $data_file['size'];
                    $ticket_img_type = $data_file['type'];
                    $ticket_image = $this->model->add_name_file_time($ticket_img_name, 'image');
                    if (in_array($ticket_img_type, TYPE_IMG)) {
                        if ($ticket_img_size <= SIZE_IMG) {
                            $add_ticket = $this->model->add_ticket($ticket_title, $ticket_description, $ticket_image, $ticket_status, $ticket_type, $user_id, $ip, $time);
                            if ($add_ticket) {
                                $file_uploader->uploader($ticket_img_tmp, $ticket_img_type, $ticket_image, 'image_ticket', DL_DOMAIN . '/uploader/getter.php');
                                echo response::Json(200, true, [
                                    'domain' => DOMAIN,
                                    'message' => 'تیکت با موفقیت ایجاد شد',
                                    'redirect' => DOMAIN . '/account/tickets'
                                ]);
                            } else
                                echo response::Json(500, true, [
                                    'domain' => DOMAIN,
                                    'message' => 'خطا در ایجاد تیکت'
                                ]);
                        } else
                            echo response::Json(500, true, [
                                'domain' => DOMAIN,
                                'message' => 'حجم تصویر باید زیر ۲ مگابایت باشد'
                            ]);
                    } else
                        echo response::Json(500, true, [
                            'domain' => DOMAIN,
                            'message' => 'پسوند های مجاز است png یا jpg یا jpeg'
                        ]);
                } else {
                    $add_ticket = $this->model->add_ticket($ticket_title, $ticket_description, null, $ticket_status, $ticket_type, $user_id, $ip, $time);
                    if ($add_ticket) {
                        echo response::Json(200, true, [
                            'domain' => DOMAIN,
                            'message' => 'تیکت با موفقیت ایجاد شد',
                            'redirect' => DOMAIN . '/account/tickets'
                        ]);
                    } else
                        echo response::Json(500, true, [
                            'domain' => DOMAIN,
                            'message' => 'خطا در ایجاد تیکت'
                        ]);
                }
            } else {
                if (empty($ticket_title))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد عنوان تیکت اجباری است'
                    ]);
                if (empty($ticket_description))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد متن تیکت اجباری است'
                    ]);
            }
        }
    }

    public function ticket_answer()
    {
        if (isset($_POST['btn_answer_ticket'])) {
            $data = $_POST;
            $file_uploader = new file_uploader();
            $ticket_description = $this->model->security($data['ticket_description']);
            $user_id = $this->model->security($data['user_id']);
            $ticket_id = $this->model->security($data['ticket_id']);
            $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
            $ip = $_SERVER['REMOTE_ADDR'];
            $ticket_type = 'user';
            $ticket_status = 'waiting';
            if (isset($ticket_description, $user_id, $ticket_id) && !empty($ticket_description) && !empty($user_id) && !empty($ticket_id)) {
                if (isset($_FILES['ticket_image']['name']) && !empty($_FILES['ticket_image']['name'])) {
                    $data_file = $_FILES['ticket_image'];
                    $ticket_img_name = $data_file['name'];;
                    $ticket_img_tmp = $data_file['tmp_name'];
                    $ticket_img_size = $data_file['size'];
                    $ticket_img_type = $data_file['type'];
                    $ticket_image = $this->model->add_name_file_time($ticket_img_name, 'image');
                    if (in_array($ticket_img_type, TYPE_IMG)) {
                        if ($ticket_img_size <= SIZE_IMG) {
                            $add_ticket = $this->model->ticket_answer($ticket_description, $ticket_image, $ticket_status, $ticket_type, $ticket_id, $user_id, $ip, $time);
                            if ($add_ticket) {
                                $file_uploader->uploader($ticket_img_tmp, $ticket_img_type, $ticket_image, 'image_ticket', DL_DOMAIN . '/uploader/getter.php');
                                $this->model->ticket_status($ticket_id, $ticket_status);
                                echo response::Json(200, true, [
                                    'domain' => DOMAIN,
                                    'message' => 'پاسخ تیکت با موفقیت ثبت شد',
                                    'redirect' => DOMAIN . "/account/ticket/{$ticket_id}"
                                ]);
                            } else
                                echo response::Json(500, true, [
                                    'domain' => DOMAIN,
                                    'message' => 'خطا در ثبت پاسخ'
                                ]);
                        } else
                            echo response::Json(500, true, [
                                'domain' => DOMAIN,
                                'message' => 'حجم تصویر باید زیر ۲ مگابایت باشد'
                            ]);
                    } else
                        echo response::Json(500, true, [
                            'domain' => DOMAIN,
                            'message' => 'پسوند های مجاز است png یا jpg یا jpeg'
                        ]);
                } else {
                    $add_ticket = $this->model->ticket_answer($ticket_description, null, $ticket_status, $ticket_type, $ticket_id, $user_id, $ip, $time);
                    if ($add_ticket) {
                        $this->model->ticket_status($ticket_id, $ticket_status);
                        echo response::Json(200, true, [
                            'domain' => DOMAIN,
                            'message' => 'پاسخ تیکت با موفقیت ثبت شد',
                            'redirect' => DOMAIN . "/account/ticket/{$ticket_id}"
                        ]);
                    } else
                        echo response::Json(500, true, [
                            'domain' => DOMAIN,
                            'message' => 'خطا در ثبت پاسخ'
                        ]);
                }
            } else {
                if (empty($ticket_description))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد متن تیکت اجباری است'
                    ]);
                if (empty($user_id) || empty($ticket_id))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'اطلاعات ارسالی ناقص است'
                    ]);
            }
        }
    }

    public function closed_ticket()
    {
        if (isset($_POST['btn_ticket_closed'])) {
            $data = $_POST;
            $ticket_id = $this->model->security($_POST['ticket_id']);
            $get_user = $this->model->find('user_email', $this->model->decrypt(Model::SessionGet('user')));
            $user_id = $get_user->id;
            if (!empty($ticket_id)) {
                $closed_ticket = $this->model->closed_ticket('closed', $ticket_id, $user_id);
                if ($closed_ticket) {
                    echo response::Json(200, true, [
                        'domain' => DOMAIN,
                        'message' => 'تیکت با موفقیت بسته شد',
                        'redirect' => DOMAIN . "/account/ticket/{$ticket_id}"
                    ]);
                } else
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'خطا در بسته شدن تیکت'
                    ]);
            } else {
                echo response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'اطلاعات ارسالی ناقص است'
                ]);
            }
        }
    }

    public function edit_profile()
    {
        $this->msgUserNot();
        $data = $_POST;
        $first_name = $this->model->security($data['first_name']);
        $last_name = $this->model->security($data['last_name']);
        $user_id = $this->model->find('user_email', $this->model->decrypt(Model::SessionGet('user')))->id;
        if (isset($first_name, $last_name) && !empty($first_name) && !empty($last_name)):
            $edit = $this->model->edit_profile($first_name, $last_name, $user_id);
            echo ($edit) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'پروفایل با موفقیت ویرایش شد']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در ویرایش پروفایل']);
        else:
            if (empty($first_name)) echo response::Json(500, true, [
                'domain' => DOMAIN,
                'message' => 'فیلد نام اجباری است'
            ]);
            if (empty($last_name)) echo response::Json(500, true, [
                'domain' => DOMAIN,
                'message' => 'فیلد نام خانوادگی اجباری است'
            ]);
        endif;
    }

    public function password_edit()
    {
        $this->msgUserNot();
        $data = $_POST;
        $current_password = $this->model->security($data['current_password']);
        $password = $this->model->security($data['password']);
        $re_password = $this->model->security($data['re_password']);
        $get_user = $this->model->find('user_email', $this->model->decrypt(Model::SessionGet('user')));
        if (isset($current_password, $password, $re_password) && !empty($current_password) && !empty($re_password)):
            if ($this->model->decrypt($get_user->user_password) != $current_password): echo response::Json(500, true, [
                'domain' => DOMAIN,
                'message' => 'رمز عبور وارد شده با رمز فعلی تطابق ندارد'
            ]);
                die(); endif;
            if ($password != $re_password):
                echo response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'رمز عبور وارد شده با رمز فعلی تطابق ندارد'
                ]);
                die(); endif;
            $password = $this->model->encrypt($password);
            $edit = $this->model->password_edit($password, $get_user->id);
            echo ($edit) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'رمز عبور با موفقیت ویرایش شد']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در ویرایش رمز عبور']);
        else:
            if (empty($current_password)) echo response::Json(500, true, [
                'domain' => DOMAIN,
                'message' => 'فیلد رمز عبور فعلی اجباری است'
            ]);
            if (empty($password)) echo response::Json(500, true, [
                'domain' => DOMAIN,
                'message' => 'فیلد رمز عبور جدید اجباری است'
            ]);
            if (empty($re_password)) echo response::Json(500, true, [
                'domain' => DOMAIN,
                'message' => 'فیلد تکرار رمز عبور اجباری است'
            ]);
        endif;
    }

    private function msgUserNot()
    {
        if (!Model::SessionGet('user')):
            echo response::Json(500, true, [
                'domain' => DOMAIN,
                'message' => 'اطلاعات ارسالی ناقص است'
            ]);
            die();
        endif;
    }

    private function isUser($login = false)
    {
        $get_session_user = Model::SessionGet('user');
        if ($login) {
            if ($get_session_user) Model::redirect('account');
        } else {
            if (!$get_session_user) Model::redirect('login');
            if ($get_session_user):
                $get_user = $this->model->find('user_email', $this->model->decrypt(Model::SessionGet('user')));
                return ($get_user) ? $get_user : $this->logout();
            endif;
        }
    }

}
