<?php

class model_login extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($email, $password)
    {
        $sql = $this->Select("SELECT * FROM `users` WHERE `user_email` = ? AND `user_password` = ?", [$email, $password], 'fetch', PDO::FETCH_OBJ, true);
        return ($sql) ? true : false;
    }
}