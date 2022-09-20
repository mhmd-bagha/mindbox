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
        $this->title = 'پنل کاربری';
        $get_user = $this->model->find('user_email', $this->model->decrypt(Model::SessionGet('user')));
        $register_you_history = $this->register_you_history($get_user->create_time);
        $count_my_course = $this->count_my_course();
        $this->view('profile/index', compact('register_you_history', 'count_my_course', 'get_user'));
    }

    public function edit_profile()
    {
        $this->title = 'ویرایش پروفایل';
        $this->view('profile/user-edit-profile');
    }

    public function change_password()
    {
        $this->title = '';
        $this->view('profile/user-change-password');
    }

    public function wallet()
    {
        $this->title = '';
        $this->view('profile/user-wallet');
    }

    public function my_courses()
    {
        $this->title = '';
        $my_courses = $this->my_courses();
        $this->view('profile/user-my-courses', compact('my_courses'));
    }

    public function factors()
    {
        $this->title = '';
        $this->view('profile/user-factors');
    }

    public function tickets()
    {
        $this->title = 'مایندباکس‌ | تیکت‌ها';
        $get_user = $this->model->find('user_email', $this->model->decrypt(Model::SessionGet('user')));
        $tickets_all = $this->model->tickets_all($get_user->id);
        $this->view('profile/user-tickets', compact('tickets_all'));
    }

    public function ticket(int $id = null)
    {
        if (empty($id)) Model::error404();
        $id = $this->model->security($id);
        $get_ticket = $this->model->where('tickets', 'id', $id);
        $chat_ticket = $this->model->chat_ticket($id);
        $this->title = "مایندباکس | تیکت {$get_ticket->ticket_title}";
        $this->view('profile/user-ticket', compact('chat_ticket', 'get_ticket'));
    }

    public function add_ticket()
    {
        $this->title = 'مایندباکس‌ | ایجاد تیکت';
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
            if (empty($ticket_id)) {
                $closed_ticket = $this->model->closed_ticket('closed', $ticket_id);
                if ($closed_ticket) {
                    echo response::Json(500, true, [
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
}
