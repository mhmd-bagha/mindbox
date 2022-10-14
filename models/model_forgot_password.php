<?php

class model_forgot_password extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function change_password($password, $email)
    {
        $query = $this->Query("UPDATE `users` SET `user_password` = ? WHERE 'user_email' = ?", [$password, $email]);
        return $query;
    }
}