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

class admin extends Controller
{
    private $comment;
    private $users;
    private $sliders;
    private $categories;
    private $courses;
    private $tickets;
    private $menu;

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
        $this->view('admin/admin-social-networks', '', null, null);
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
        $this->view('admin/pages/admin-pages', '', null, null);
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
}
