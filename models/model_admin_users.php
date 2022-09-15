<?php

class model_admin_users extends Model
{
    protected $table = 'users';

    public function __construct()
    {
        parent::__construct();
    }

    public function end_users()
    {
        $query = $this->Select("SELECT * FROM `users` ORDER BY `create_time` DESC LIMIT 5");
        return $query;
    }
}