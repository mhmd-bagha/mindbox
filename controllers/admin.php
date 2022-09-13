<?php
require 'vendor/autoload.php';

use Response\Response as response;

class admin extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->body_class = 'admin-body';
    }


    public function index()
    {
        $this->title = 'پنل کاربری';
        $this->view('admin/index', '', null, null);
    }

    public function users()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'پنل کاربری';
        $this->view('admin/admin-users', '', null, null);
    }

    public function discounts()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css', 'vendor/datepicker/persian-datepicker.min.css', 'vendor/tom-select/tom-select.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'vendor/datepicker/persian-date.min.js', 'vendor/datepicker/persian-datepicker.min.js', 'vendor/tom-select/tom-select.complete.min.js', 'js/admin.js'];
        $this->title = 'پنل کاربری';
        $this->view('admin/admin-discounts', '', null, null);
    }

    public function wallet()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'پنل کاربری';
        $this->view('admin/admin-wallet', '', null, null);
    }

    public function social_networks()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'پنل کاربری';
        $this->view('admin/admin-social-networks', '', null, null);
    }

    public function categories()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'vendor/lozad/lozad.min.js', 'js/admin.js'];
        $this->title = 'پنل کاربری';
        $this->view('admin/admin-categories', '', null, null);
    }

    public function courses()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css', 'vendor/tom-select/tom-select.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'vendor/lozad/lozad.min.js', 'vendor/ckeditor/ckeditor.js', 'vendor/tom-select/tom-select.complete.min.js', 'js/admin.js'];
        $this->title = 'پنل کاربری';
        $this->view('admin/admin-courses', '', null, null);
    }

    public function course_part()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'پنل کاربری';
        $this->view('admin/admin-course-part', '', null, null);
    }

    public function sliders()
    {
        $this->scripts_path = ['vendor/lozad/lozad.min.js', 'js/admin.js'];
        $this->title = 'پنل کاربری';
        $this->view('admin/admin-sliders', '', null, null);
    }

    public function comments()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'پنل کاربری';
        $this->view('admin/admin-comments', '', null, null);
    }

    public function tickets()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'پنل کاربری';
        $this->view('admin/admin-tickets', '', null, null);
    }

    public function ticket()
    {
        $this->title = 'پنل کاربری';
        $this->view('admin/admin-ticket', '', null, null);
    }

    public function menus()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'js/admin.js'];
        $this->title = 'پنل کاربری';
        $this->view('admin/admin-menus', '', null, null);
    }

    public function pages()
    {
        $this->links_path = ['vendor/datatables/datatables.min.css'];
        $this->scripts_path = ['vendor/datatables/datatables.min.js', 'js/datatable-config.js', 'vendor/ckeditor/ckeditor.js', 'js/admin.js'];
        $this->title = 'پنل کاربری';
        $this->view('admin/admin-pages', '', null, null);
    }

    public function settings()
    {
        $this->title = 'پنل کاربری';
        $this->view('admin/admin-settings', '', null, null);
    }
}