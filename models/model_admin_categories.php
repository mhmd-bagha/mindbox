<?php

class model_admin_categories extends Model
{
    protected $table = 'categories';

    public function __construct()
    {
        parent::__construct();
    }

    public function add($name, $image, $time, $ip, $author, $status_show)
    {
        $query = $this->Query("INSERT INTO `categories` (`category_title`, `category_image`, `author`, `ip`, `create_time`, `status_show`) VALUES (?, ?, ?, ?, ?, ?)", [$name, $image, $author, $ip, $time, $status_show]);
        return $query;
    }
}