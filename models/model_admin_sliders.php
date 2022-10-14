<?php

class model_admin_sliders extends Model
{
    protected $table = 'sliders';

    public function __construct()
    {
        parent::__construct();
    }

    public function add_slider($slider_name, $slider_image, $slider_address, $author, $ip, $time, $status_show)
    {
        $query = $this->Query("INSERT INTO `sliders`(`slider_title`, `slider_image`, `slider_link`, `author`, `ip`, `create_time`, `status_show`) VALUES (?, ?, ?, ?, ?, ?, ?)", [$slider_name, $slider_image, $slider_address, $author, $ip, $time, $status_show]);
        return $query;
    }

    public function edit($slider_name, $slider_address, $img_name, $time, $id)
    {
        $query = $this->Query("UPDATE `sliders` SET `slider_title` = ?, `slider_image` = ?, `slider_link` = ?, `update_time` = ? WHERE `id` = ?", [$slider_name, $img_name, $slider_address, $time, $id]);
        return $query;
    }
}