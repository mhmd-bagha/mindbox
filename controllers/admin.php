<?php
require DIR_ROOT . 'vendor/autoload.php';
require DIR_ROOT . 'vendor/api-file-uploader/api-file-uploader/uploader/Uploader.php';

use Uploader\Uploader as file_uploader;
use Response\Response as response;


require DIR_ROOT . 'models/model_admin_comment.php';
require DIR_ROOT . 'models/model_admin_users.php';
require DIR_ROOT . 'models/model_admin_sliders.php';
require DIR_ROOT . 'models/model_admin_categories.php';
require DIR_ROOT . 'models/model_admin_courses.php';
require DIR_ROOT . 'models/model_admin_ticket.php';
require DIR_ROOT . 'models/model_menu.php';
require DIR_ROOT . 'models/model_admin_information.php';
require DIR_ROOT . 'models/model_admin_social_networks.php';
require DIR_ROOT . 'models/model_admin_discounts.php';

class admin extends Controller
{
    private $comment;
    private $users;
    private $sliders;
    protected $categories;
    protected $courses;
    private $tickets;
    private $menu;
    private $information;
    private $social_network;
    private $discounts;

    public function __construct()
    {
        parent::__construct();
        $this->body_class = 'admin-body';
        $this->keywords = '';
        $this->robots = 'noindex, nofollow';
        $this->comment = new model_admin_comment();
        $this->users = new model_admin_users();
        $this->sliders = new model_admin_sliders();
        $this->categories = new model_admin_categories();
        $this->courses = new model_admin_courses();
        $this->tickets = new model_admin_ticket();
        $this->menu = new model_menu();
        $this->information = new model_admin_information();
        $this->social_network = new model_admin_social_networks();
        $this->discounts = new model_admin_discounts();
    }

    public function index()
    {
        $this->isAdmin();
        $this->title = 'ادمین | داشبورد';
        $this->scripts_path = ['js/admin.js'];
        $end_comments = $this->comment->end_comments();
        $end_users = $this->users->end_users();
        $count_all_users = $this->model->count_all_table('users');
        $count_all_comments = $this->model->count_where('comments', 'comment_type', 'user');
        $count_all_courses = $this->model->count_all_table('courses');
        $count_all_tickets = $this->tickets->count_all_ticket();
        $this->view('admin/index', compact('end_comments', 'end_users', 'count_all_users', 'count_all_comments', 'count_all_courses', 'count_all_tickets'), null, null);
    }

    private function isAdmin($login = false)
    {
        $get_admin = Model::SessionGet('admin');
        if ($login) {
            if ($get_admin) Model::redirect('admin');
        } else {
            if (!$get_admin) Model::redirect('admin/login');
        }
    }

    public function login()
    {
        $this->isAdmin(true);
        $this->title = 'ادمین | ورود';
        $this->view('admin/admin-login', '', null, null);
    }

    public function users()
    {
        $this->isAdmin();
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'ادمین | کاربران';
        $user_all = $this->users->all();
        $this->view('admin/admin-users', compact('user_all'), null, null);
    }

    public function discounts()
    {
        $this->isAdmin();
        $this->links_path = ['vendor/datatables/datatables.min.css', 'vendor/datepicker/persian-datepicker.min.css', 'vendor/tom-select/tom-select.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'vendor/datepicker/persian-date.min.js', 'vendor/datepicker/persian-datepicker.min.js', 'vendor/tom-select/tom-select.complete.min.js', 'js/admin.js'];
        $this->title = 'ادمین | تخفیف ها';
        $discount_all = $this->discounts->all();
        $get_courses = $this->discounts->get_courses();
        $this->view('admin/discounts/admin-discounts', compact('discount_all', 'get_courses'), null, null);
    }

    public function wallet()
    {
        $this->isAdmin();
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'ادمین | کیف پول';
        $wallet_payments = $this->model->where_all('payment', 'payment_type', 'user_wallet');
        $this->view('admin/wallet/admin-wallet', compact('wallet_payments'), null, null);
    }

    public function social_networks()
    {
        $this->isAdmin();
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'ادمین | شبکه های اجتماعی';
        $social_networks = $this->social_network->all();
        $this->view('admin/social-networks/admin-social-networks', compact('social_networks'), null, null);
    }

    public function categories()
    {
        $this->isAdmin();
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'vendor/lozad/lozad.min.js', 'js/admin.js'];
        $this->title = 'ادمین | دسته‌بندی ها';
        $categories_all = $this->categories->all();
        $this->view('admin/categories/admin-categories', compact('categories_all'), null, null);
    }

    public function courses()
    {
        $this->isAdmin();
        $this->links_path = ['vendor/datatables/datatables.min.css', 'vendor/tom-select/tom-select.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'vendor/lozad/lozad.min.js', 'vendor/tom-select/tom-select.complete.min.js', 'js/admin.js'];
        $this->scripts_cdn = ['http://cdn.ckeditor.com/4.20.0/full/ckeditor.js'];
        $this->title = 'ادمین | دوره‌ها';
        $courses_all = $this->courses->all();
        $this->view('admin/courses/admin-courses', compact('courses_all'), null, null);
    }

    public function course_part(int $id = null)
    {
        $this->isAdmin();
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'ادمین | مدیریت دوره';
        if (empty($id)) Model::error404();
        $id = $this->courses->security($id);
        $course_files = $this->courses->where_all('course_files', 'course_id', $id);
        $this->view('admin/course-part/admin-course-part', compact('course_files'), null, null);
    }

    public function sliders()
    {
        $this->isAdmin();
        $this->scripts_path = ['vendor/lozad/lozad.min.js', 'js/admin.js'];
        $this->title = 'ادمین | اسلایدر‌ها';
        $slider_all = $this->sliders->all();
        $this->view('admin/sliders/admin-sliders', compact('slider_all'), null, null);
    }

    public function comments()
    {
        $this->isAdmin();
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'ادمین | نظرات';
        $comment_all = $this->comment->where_all('comments', 'comment_type', 'user');
        $this->view('admin/admin-comments', compact('comment_all'), null, null);
    }

    public function tickets()
    {
        $this->isAdmin();
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'ادمین | تیکت‌ها';
        $ticket_all = $this->tickets->get_tickets();
        $this->view('admin/admin-tickets', compact('ticket_all'), null, null);
    }

    public function ticket(int $id = null)
    {
        $this->isAdmin();
        if (empty($id)) Model::error404();
        $this->scripts_path = ['js/admin.js'];
        $get_ticket = $this->tickets->where('tickets', 'id', $id);
        $chat_ticket = $this->tickets->get_ticket($id);
        $this->title = "ادمین | تیکت {$get_ticket->ticket_title}";
        $this->view('admin/admin-ticket', compact('get_ticket', 'chat_ticket'), null, null);
    }

    public function menus()
    {
        $this->isAdmin();
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'ادمین | منو‌ها';
        $menu_all = $this->menu->all();
        $this->view('admin/menu/admin-menus', compact('menu_all'), null, null);
    }

    public function pages()
    {
        $this->isAdmin();
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->scripts_cdn = ['http://cdn.ckeditor.com/4.20.0/full/ckeditor.js'];
        $this->title = 'ادمین | صفحات';
        $rules = $this->information->getAll('rules');
        $this->view('admin/pages/admin-pages', compact('rules'), null, null);
    }

    public function settings()
    {
        $this->isAdmin();
        $this->scripts_path = ['js/admin.js'];
        $this->title = 'ادمین | تنظیمات';
        $this->view('admin/settings/admin-settings', '', null, null);
    }

    public function logout()
    {
        unset($_SESSION['admin']);
        Model::redirect('admin/');
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
        $data = $_POST;
        if (isset($data['id'], $data['type']) && !empty($data['id']) && !empty($data['type'])) {
            $id = $this->model->security($data['id']);
            $type = $this->model->security($data['type']);
            $query = $this->model->change_status($type, 'hide', $id);
            echo ($query) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'آیتم با موفقیت غیرفعال شد']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در غیرفعال کردن آیتم']);
        } else
            echo response::Json(500, true, [
                'domain' => DOMAIN,
                'message' => 'داده های ارسالی ناقص است'
            ]);
    }

    public function enable()
    {
        $data = $_POST;
        if (isset($data['id'], $data['type']) && !empty($data['id']) && !empty($data['type'])) {
            $id = $this->model->security($data['id']);
            $type = $this->model->security($data['type']);
            $query = $this->model->change_status($type, 'show', $id);
            echo ($query) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'آیتم با موفقیت فعال شد']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در فعال کردن آیتم']);
        } else
            echo response::Json(500, true, [
                'domain' => DOMAIN,
                'message' => 'داده های ارسالی ناقص است'
            ]);
    }

    public function deleteItem()
    {
        $file_uploader = new file_uploader();
        $data = $_POST;
        if (isset($data['id'], $data['table']) && !empty($data['id']) && !empty($data['table'])) {
            if (isset($data['directory'])):
                $dir = $data['directory'];
                $del = $file_uploader->delete(DL_DOMAIN . '/uploader/delete.php', $dir, 'directory');
            endif;
            $id = $this->model->security($data['id']);
            $table = $this->model->security($data['table']);
            if ($table == 'discounts'):
                $discount = $this->model->where('discounts', 'id', $id)->course_id;
                $this->discounts->deleteDiscount($discount);
            endif;
            $query = $this->model->delete($table, $id);
            echo ($query) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'آیتم با موفقیت حذف شد']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در حذف کردن آیتم']);
        } else
            echo response::Json(500, true, [
                'domain' => DOMAIN,
                'message' => 'داده های ارسالی ناقص است'
            ]);
    }
}