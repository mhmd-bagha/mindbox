<?php

class model_admin extends Model
{
    protected $table = 'admins';

    public function __construct()
    {
        parent::__construct();
    }

    public function login_admin($email, $password)
    {
        $login_admin = $this->Select("SELECT `admin_email`, `admin_password` FROM `admins` WHERE `admin_email` = ? AND `admin_password` = ?", [$email, $password], 'fetch');
        return $login_admin ? true : false;
    }

    public function register_admin($first_name, $last_name, $email, $password, $ip, $time)
    {
        $register_admin = $this->Query("INSERT INTO `admins` (`first_name`, `last_name`, `admin_email`, `admin_password`, `ip`, `create_time`) VALUES (?, ?, ?, ?, ?, ?)", [$first_name, $last_name, $email, $password, $ip, $time]);
        return $register_admin ? true : false;
    }
}
