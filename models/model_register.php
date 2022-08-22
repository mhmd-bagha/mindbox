<?php
require 'vendor/autoload.php';

class model_register extends Model
{
    private $model;

    public function __construct()
    {
        parent::$conn;
        $this->model = new Model();
    }

    public function register($first_name, $last_name, $phone_mobile, $email, $password, $user_status, $user_hash, $ip, $create_time)
    {
        $sql = $this->model->Query("INSERT INTO `users`(`first_name`, `last_name`, `phone_mobile`, `user_email`, `user_password`, `user_status`, `user_hash`, `ip`, `create_time`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)", $first_name, $last_name, $phone_mobile, $email, $password, $user_status, $user_hash, $ip, $create_time);
        return ($sql) ? true : false;
    }

    public function existUser($email, $phone_mobile)
    {
        $sql = $this->model->Select("SELECT `user_email`, `phone_mobile` FROM `users` WHERE `user_email`= ? AND `phone_mobile`= ?", [$email, $phone_mobile], 'fetch', PDO::FETCH_OBJ, true);
        return ($sql == 0) ? true : false;
    }
}