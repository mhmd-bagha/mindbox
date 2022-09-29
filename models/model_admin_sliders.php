<?php

class model_admin_sliders extends Model
{
    protected $table = 'sliders';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_slider_id($id)
    {
        $query = $this->Select("SELECT * FROM `sliders` WHERE `id` = ?", [$id]);
        return $query;
    }

    public function add_slider($slider_name, $slider_image, $slider_address, $author, $ip, $time, $status_show)
    {
        $query = $this->Query("INSERT INTO `sliders`(`slider_title`, `slider_image`, `slider_link`, `author`, `ip`, `create_time`, `status_show`) VALUES (?, ?, ?, ?, ?, ?, ?)", [$slider_name, $slider_image, $slider_address, $author, $ip, $time, $status_show]);
        return $query;
    }
}