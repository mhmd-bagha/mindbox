<?php
require 'vendor/autoload.php';

use Response\Response as response;

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
        $this->view('profile/index');
    }

    public function user_edit_profile(){
        $this->title = 'ویرایش پروفایل';
        $this->view('profile/user-edit-profile');
    }

    public function user_change_password(){
        $this->title = '';
        $this->view('profile/user-change-password');
    }

    public function user_wallet(){
        $this->title = '';
        $this->view('profile/user-wallet');
    }

    public function user_my_courses(){
        $this->title = '';
        $this->view('profile/user-my-courses');
    }

    public function user_factors(){
        $this->title = '';
        $this->view('profile/user-factors');
    }

    public function user_tickets(){
        $this->title = '';
        $this->view('profile/user-tickets');
    }

    public function user_ticket(){
        $this->title = '';
        $this->view('profile/user-ticket');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        $this->model->redirect(DOMAIN);
    }
}