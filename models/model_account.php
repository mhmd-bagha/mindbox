<?php

class model_account extends Model
{
    protected $table = 'users';
    public function __construct()
    {
        parent::__construct();
    }

    public function count_my_course(){}
}