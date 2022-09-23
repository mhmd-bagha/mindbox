<?php
require DIR_ROOT . 'vendor/autoload.php';
require DIR_ROOT . 'vendor/api-file-uploader/api-file-uploader/uploader/Uploader.php';

use Uploader\Uploader as file_uploader;
use Response\Response as response;


require 'admin_comment.php';
require 'admin_users.php';
require 'admin_sliders.php';
require 'admin_categories.php';
require 'admin_courses.php';
require 'admin_ticket.php';
require 'menu.php';
require 'admin_information.php';
require 'admin_social_networks.php';

class admin extends Controller
{
    private $comment;
    private $users;
    private $sliders;
    private $categories;
    private $courses;
    private $tickets;
    private $menu;
    private $information;
    private $social_network;

    public function __construct()
    {
        parent::__construct();
        $this->body_class = 'admin-body';
        $this->keywords = '';
        $this->robots = 'noindex, nofollow';
        $this->comment = new admin_comment();
        $this->users = new admin_users();
        $this->sliders = new admin_sliders();
        $this->categories = new admin_categories();
        $this->courses = new admin_courses();
        $this->tickets = new admin_ticket();
        $this->menu = new menu();
        $this->information = new admin_information();
        $this->social_network = new admin_social_networks();
    }

    public function index()
    {
        if (!Model::SessionGet('admin')) Model::redirect('admin/login');
        $this->title = 'ادمین | داشبورد';
        $this->scripts_path = ['js/admin.js'];
        $end_comments = $this->comment->end_comments();
        $end_users = $this->users->end_users();
        $count_all_users = $this->model->count_all_table('users');
        $count_all_comments = $this->model->count_all_table('comments');
        $count_all_courses = $this->model->count_all_table('courses');
        $this->view('admin/index', compact('end_comments', 'end_users', 'count_all_users', 'count_all_comments', 'count_all_courses'), null, null);
    }

    public function login()
    {
        if (Model::SessionGet('admin')) Model::redirect('admin');
        $this->title = 'ادمین | ورود';
        $this->view('admin/admin-login', '', null, null);
    }

    public function users()
    {
        if (!Model::SessionGet('admin')) Model::redirect('admin/login');
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'ادمین | کاربران';
        $user_all = $this->users->model_users->all();
        $this->view('admin/admin-users', compact('user_all'), null, null);
    }

    public function discounts()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css', 'vendor/datepicker/persian-datepicker.min.css', 'vendor/tom-select/tom-select.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'vendor/datepicker/persian-date.min.js', 'vendor/datepicker/persian-datepicker.min.js', 'vendor/tom-select/tom-select.complete.min.js', 'js/admin.js'];
        $this->title = 'ادمین | تخفیف ها';
        $this->view('admin/admin-discounts', '', null, null);
    }

    public function wallet()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'ادمین | کیف پول';
        $this->view('admin/admin-wallet', '', null, null);
    }

    public function social_networks()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'ادمین | شبکه های اجتماعی';
        $social_networks = $this->social_network->model_social_networks->all();
        $this->view('admin/admin-social-networks', compact('social_networks'), null, null);
    }

    public function categories()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'vendor/lozad/lozad.min.js', 'js/admin.js'];
        $this->title = 'ادمین | دسته‌بندی ها';
        $categories_all = $this->categories->model_categories->all();
        $this->view('admin/admin-categories', compact('categories_all'), null, null);
    }

    public function courses()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css', 'vendor/tom-select/tom-select.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'vendor/lozad/lozad.min.js', 'vendor/ckeditor/ckeditor.js', 'vendor/tom-select/tom-select.complete.min.js', 'js/admin.js'];
        $this->title = 'ادمین | دوره‌ها';
        $courses_all = $this->courses->model_courses->all();
        $this->view('admin/admin-courses', compact('courses_all'), null, null);
    }

    public function course_part(int $id = null)
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'ادمین | مدیریت دوره';
        if (empty($id)) Model::error404();
        $id = $this->courses->model_courses->security($id);
        $course_files = $this->courses->model_courses->where_all('course_files', 'course_id', $id);
        $this->view('admin/admin-course-part', compact('course_files'), null, null);
    }

    public function sliders()
    {
        if (!Model::SessionGet('admin')) Model::redirect('admin/login');
        $this->scripts_path = ['vendor/lozad/lozad.min.js', 'js/admin.js'];
        $this->title = 'ادمین | اسلایدر‌ها';
        $slider_all = $this->sliders->model_sliders->all();
        $this->view('admin/admin-sliders', compact('slider_all'), null, null);
    }

    public function comments()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'ادمین | نظرات';
        $comment_all = $this->comment->model_comment->where_all('comments', 'comment_type', 'user');
        $this->view('admin/admin-comments', compact('comment_all'), null, null);
    }

    public function tickets()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'ادمین | تیکت‌ها';
        $ticket_all = $this->tickets->model_ticket->get_tickets();
        $this->view('admin/admin-tickets', compact('ticket_all'), null, null);
    }

    public function ticket(int $id = null)
    {
        if (empty($id)) Model::error404();
        $get_ticket = $this->tickets->model_ticket->where('tickets', 'id', $id);
        $chat_ticket = $this->tickets->model_ticket->get_ticket($id);
        $this->title = "ادمین | تیکت {$get_ticket->ticket_title}";
        $this->view('admin/admin-ticket', compact('get_ticket', 'chat_ticket'), null, null);
    }

    public function menus()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'ادمین | منو‌ها';
        $menu_all = $this->menu->model_menu->all();
        $this->view('admin/admin-menus', compact('menu_all'), null, null);
    }

    public function pages()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'vendor/ckeditor/ckeditor.js', 'js/admin.js'];
        $this->title = 'ادمین | صفحات';
        $rules = $this->information->model_information->getAll('rules');
        $this->view('admin/pages/admin-pages', compact('rules'), null, null);
    }

    public function settings()
    {
        $this->title = 'ادمین | تنظیمات';
        $this->view('admin/admin-settings', '', null, null);
    }

    public function login_admin()
    {
        if (isset($_POST['btn_login_admin'])) {
            $data = $_POST;
            $email = $this->model->security($data['email']);
            $email_hash = $this->model->encrypt($email);
            $password = $this->model->security($data['password']);
            $password = $this->model->encrypt($password);
            $ip = $_SERVER['REMOTE_ADDR'];
            $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
            if (isset($email, $password)) {
                if ($email == ADMIN_EMAIL && $password == ADMIN_PASSWORD) {
                    if ($this->model->login_admin($email, $password)) {
                        Model::SessionSet('admin', $email_hash);
                        echo response::Json(200, true, [
                            'domain' => DOMAIN,
                            'message' => 'ورود با موفقیت انجام شد',
                            'redirect' => DOMAIN . '/admin'
                        ]);
                    } else {
                        echo response::Json(201, true, [
                            'domain' => DOMAIN,
                            'message' => 'ثبت نام ادمین',
                        ]);
                    }
                } else
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'ادمینی با مشخصات وارد شده یافت نشد'
                    ]);
            } else {
                if (empty($email))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'لطفا ایمیل را پر کنید'
                    ]);

                if (empty($password))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'لطفا رمز عبور را پر کنید'
                    ]);
            }
        }
    }

    public function register_admin()
    {
        if (isset($_POST['btn_register_admin'])) {
            $data = $_POST;
            $first_name = $this->model->security($data['first_name']);
            $last_name = $this->model->security($data['last_name']);
            $email = $this->model->security($data['email']);
            $email_hash = $this->model->encrypt($email);
            $password = $this->model->security($data['password']);
            $password = $this->model->encrypt($password);
            $ip = $_SERVER['REMOTE_ADDR'];
            $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
            if (isset($first_name, $last_name, $email, $password) && !empty($first_name) && !empty($last_name) && !empty($email) && !empty($password)) {
                $register_admin = $this->model->register_admin($first_name, $last_name, $email, $password, $ip, $time);
                if ($register_admin) {
                    Model::SessionSet('admin', $email_hash);
                    echo response::Json(200, true, [
                        'domain' => DOMAIN,
                        'message' => 'ثبت نام با موفقیت انجام شد',
                        'redirect' => DOMAIN . '/admin'
                    ]);
                } else
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'خطا در ثبت نام ادمین'
                    ]);
            } else {
                if (empty($first_name))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد نام را پر کنید',
                    ]);
                if (empty($last_name))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد نام خانوادگی را پر کنید',
                    ]);
                if (empty($email))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد ایمیل را پر کنید',
                    ]);
                if (empty($password))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد رمز عبور را پر کنید',
                    ]);
            }
        }
    }

    public function get_slider_id()
    {
        $get_slider_id = $this->sliders->get_slider_id();
    }

    public function ticket_answer()
    {
        if (isset($_POST['btn_answer_ticket'])) {
            $data = $_POST;
            $file_uploader = new file_uploader();
            $ticket_description = $this->model->security($data['ticket_description']);
            $admin_id = $this->model->security($data['admin_id']);
            $ticket_id = $this->model->security($data['ticket_id']);
            $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
            $ip = $_SERVER['REMOTE_ADDR'];
            $ticket_type = 'admin';
            $ticket_status = 'answered';
            if (isset($ticket_description, $admin_id, $ticket_id) && !empty($ticket_description) && !empty($admin_id) && !empty($ticket_id)) {
                if (isset($_FILES['ticket_image']['name']) && !empty($_FILES['ticket_image']['name'])) {
                    $data_file = $_FILES['ticket_image'];
                    $ticket_img_name = $data_file['name'];;
                    $ticket_img_tmp = $data_file['tmp_name'];
                    $ticket_img_size = $data_file['size'];
                    $ticket_img_type = $data_file['type'];
                    $ticket_image = $this->model->add_name_file_time($ticket_img_name, 'image');
                    if (in_array($ticket_img_type, TYPE_IMG)) {
                        if ($ticket_img_size <= SIZE_IMG) {
                            $add_ticket = $this->tickets->model_ticket->ticket_answer($ticket_description, $ticket_image, $ticket_status, $ticket_type, $ticket_id, $admin_id, $ip, $time);
                            if ($add_ticket) {
                                $file_uploader->uploader($ticket_img_tmp, $ticket_img_type, $ticket_image, 'image_ticket', DL_DOMAIN . '/uploader/getter.php');
                                $this->tickets->model_ticket->ticket_status($ticket_id, $ticket_status);
                                echo response::Json(200, true, [
                                    'domain' => DOMAIN,
                                    'message' => 'پاسخ تیکت با موفقیت ثبت شد',
                                    'redirect' => DOMAIN . "/admin/ticket/{$ticket_id}"
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
                    $add_ticket = $this->tickets->model_ticket->ticket_answer($ticket_description, null, $ticket_status, $ticket_type, $ticket_id, $admin_id, $ip, $time);
                    if ($add_ticket) {
                        $this->tickets->model_ticket->ticket_status($ticket_id, $ticket_status);
                        echo response::Json(200, true, [
                            'domain' => DOMAIN,
                            'message' => 'پاسخ تیکت با موفقیت ثبت شد',
                            'redirect' => DOMAIN . "/admin/ticket/{$ticket_id}"
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
                if (empty($admin_id) || empty($ticket_id))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'اطلاعات ارسالی ناقص است'
                    ]);
            }
        }
    }

    public function add_menu()
    {
        if (isset($_POST['btn_add_menu'])) {
            $data = $_POST;
            $menu_name = $this->model->security($data['menu_name']);
            $menu_address = $this->model->security($data['menu_address']);
            $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
            $status_show = 'show';
            if (isset($menu_name, $menu_address) && !empty($menu_name) && !empty($menu_address)) {
                if (filter_var($menu_address, FILTER_VALIDATE_URL)) {
                    $menu_add = $this->menu->model_menu->add($menu_name, $menu_address, $status_show, $time);
                    if ($menu_add)
                        echo response::Json(200, true, [
                            'domain' => DOMAIN,
                            'message' => 'منو با موفقیت ایجاد شد',
                            'redirect' => DOMAIN . '/admin/menus'
                        ]);
                    else
                        echo response::Json(500, true, [
                            'domain' => DOMAIN,
                            'message' => 'خطا در ثبت منو'
                        ]);
                } else
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فرمت آدرس منو نامعتبر است'
                    ]);
            } else {
                if (empty($menu_name))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد نام منو را پر کنید'
                    ]);
                if (empty($menu_address))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد آدرس منو را پر کنید'
                    ]);
            }
        }
    }

    public function add_rules()
    {
        if (isset($_POST['btn_rule'])) {
            $data = $_POST;
            $title = $this->model->security($data['title']);
            $description = $this->model->security($data['description']);
            $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
            $status = 'show';
            $ip = $_SERVER['REMOTE_ADDR'];
            $information_type = 'rules';
            if (isset($title, $description) && !empty($title) && !empty($description)) {
                $json_data = ['rule_title' => $title, 'rule_description' => $description];
                $json_data = json_encode($json_data, true);
                $add_rule = $this->information->model_information->add($information_type, $json_data, $ip, $time, $status);
                echo ($add_rule) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'قانون با موفقیت اضافه شد', 'redirect' => DOMAIN . '/admin/pages']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در اضافه کردن قانون']);
            } else {
                if (empty($title))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد عنوان قوانین اجباری است'
                    ]);
                if (empty($description))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد عنوان قوانین اجباری است'
                    ]);
            }
        }
    }

    public function add_contact_us()
    {
        if (isset($_POST['btn_contact_us'])) {
            $data = $_POST;
            $address = $this->model->security($data['address']);
            $phone_mobile = $this->model->security($data['phone_mobile']);
            $email = $this->model->security($data['email']);
            $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
            $status = 'show';
            $ip = $_SERVER['REMOTE_ADDR'];
            $information_type = 'contact_us';
            if (isset($address, $phone_mobile, $email) && !empty($address) && !empty($phone_mobile) && !empty($email)) {
                $json_data = ['address' => $address, 'phone_mobile' => $phone_mobile, 'email' => $email];
                $json_data = json_encode($json_data, true);
                $add_rule = $this->information->model_information->add($information_type, $json_data, $ip, $time, $status);
                echo ($add_rule) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'اطلاعات با موفقیت اضافه شد', 'redirect' => DOMAIN . '/admin/pages']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در اضافه کردن اطلاعات']);
            } else {
                if (empty($address))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد آدرس اجباری است'
                    ]);
                if (empty($phone_mobile))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد شماره تلفن اجباری است'
                    ]);
                if (empty($email))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد ایمیل اجباری است'
                    ]);
            }
        }
    }

    public function add_about_me()
    {
        if (isset($_POST['btn_about_me'])) {
            $data = $_POST;
            $title = $this->model->security($data['title']);
            $description = $this->model->security($data['description']);
            $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
            $status = 'show';
            $ip = $_SERVER['REMOTE_ADDR'];
            $information_type = 'about_me';
            if (isset($title, $description) && !empty($title) && !empty($description)) {
                $json_data = ['title' => $title, 'description' => $description];
                $json_data = json_encode($json_data, true);
                $add_rule = $this->information->model_information->add($information_type, $json_data, $ip, $time, $status);
                echo ($add_rule) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'اطلاعات با موفقیت اضافه شد', 'redirect' => DOMAIN . '/admin/pages']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در اضافه کردن اطلاعات']);
            } else {
                if (empty($title))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد عنوان اجباری است'
                    ]);
                if (empty($description))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد متن اجباری است'
                    ]);
            }
        }
    }

    public function add_network()
    {
        if (isset($_POST['btn_network'])) {
            $data = $_POST;
            $network_name = $this->model->security($data['network_name']);
            $network_address = $this->model->security($data['network_address']);
            $network_icon = $this->model->security($data['network_icon']);
            $ip = $_SERVER['REMOTE_ADDR'];
            $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
            $status_show = 'show';
            if (isset($network_name, $network_address, $network_icon) && !empty($network_name) && !empty($network_address) && !empty($network_icon)) {
                $add_social_network = $this->social_network->model_social_networks->add($network_name, $network_address, $network_icon, $ip, $time, $status_show);
                echo ($add_social_network) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'شبکه اجتماعی با موفقیت اضافه شد', 'redirect' => DOMAIN . '/admin/social_networks']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در افزودن شبکه اجتماعی']);
            } else {
                if (empty($network_name))
                    echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد عنوان اجباری است']);
                if (empty($network_address))
                    echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد آدرس اجباری است']);
                if (empty($network_icon))
                    echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'آیکون مورد نظر را انتخاب کنید']);
            }
        }
    }
}
