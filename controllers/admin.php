<?php
require DIR_ROOT . 'vendor/autoload.php';
require DIR_ROOT . 'vendor/api-file-uploader/api-file-uploader/uploader/Uploader.php';

use Uploader\Uploader as file_uploader;
use Response\Response as response;


require DIR_ROOT . 'models/model_admin_comment.php';
require 'admin_users.php';
require DIR_ROOT . 'models/model_admin_sliders.php';
require 'admin_categories.php';
require 'admin_courses.php';
require DIR_ROOT . 'models/model_admin_ticket.php';
require DIR_ROOT . 'models/model_menu.php';
require DIR_ROOT . 'models/model_admin_information.php';
require DIR_ROOT . 'models/model_admin_social_networks.php';

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
        $this->comment = new model_admin_comment();
        $this->users = new admin_users();
        $this->sliders = new model_admin_sliders();
        $this->categories = new admin_categories();
        $this->courses = new admin_courses();
        $this->tickets = new model_admin_ticket();
        $this->menu = new model_menu();
        $this->information = new model_admin_information();
        $this->social_network = new model_admin_social_networks();
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
        $social_networks = $this->social_network->all();
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
        $slider_all = $this->sliders->all();
        $this->view('admin/admin-sliders', compact('slider_all'), null, null);
    }

    public function comments()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'ادمین | نظرات';
        $comment_all = $this->comment->where_all('comments', 'comment_type', 'user');
        $this->view('admin/admin-comments', compact('comment_all'), null, null);
    }

    public function tickets()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'ادمین | تیکت‌ها';
        $ticket_all = $this->tickets->get_tickets();
        $this->view('admin/admin-tickets', compact('ticket_all'), null, null);
    }

    public function ticket(int $id = null)
    {
        if (empty($id)) Model::error404();
        $get_ticket = $this->tickets->where('tickets', 'id', $id);
        $chat_ticket = $this->tickets->get_ticket($id);
        $this->title = "ادمین | تیکت {$get_ticket->ticket_title}";
        $this->view('admin/admin-ticket', compact('get_ticket', 'chat_ticket'), null, null);
    }

    public function menus()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'ادمین | منو‌ها';
        $menu_all = $this->menu->all();
        $this->view('admin/admin-menus', compact('menu_all'), null, null);
    }

    public function pages()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'vendor/ckeditor/ckeditor.js', 'js/admin.js'];
        $this->title = 'ادمین | صفحات';
        $rules = $this->information->getAll('rules');
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

    public function disable()
    {
        $btn_name = 'btn_status_';
        $data = $_POST;
        if (isset($data['id']) && !empty($data['id'])) {
            $id = $this->model->security($data['id']);
//        comment
            if (isset($_POST[$btn_name .= 'comment'])) {
                $query = $this->model->change_status('comments', 'hide', $id);
                echo ($query) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'نظر با موفقیت غیرفعال شد']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در غیرفعال کردن نظر']);
            }
        } else
            echo response::Json(500, true, [
                'domain' => DOMAIN,
                'message' => 'داده های ارسالی ناقص است'
            ]);
    }

    public function enable()
    {
        $btn_name = 'btn_status_';
        $data = $_POST;
        if (isset($data['id']) && !empty($data['id'])) {
            $id = $this->model->security($data['id']);
//        comment
            if (isset($_POST[$btn_name .= 'comment'])) {
                $query = $this->model->change_status('comments', 'show', $id);
                echo ($query) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'نظر با موفقیت فعال شد']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در فعال کردن نظر']);
            }
        } else
            echo response::Json(500, true, [
                'domain' => DOMAIN,
                'message' => 'داده های ارسالی ناقص است'
            ]);
    }
}
