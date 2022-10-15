<?php

class model_admin_courses extends Model
{
    protected $table = 'courses';

    public function __construct()
    {
        parent::__construct();
    }

    public function add($course_title, $course_description, $course_price, $course_image, $course_demo_video_type, $course_demo_video, $course_level, $course_labels, $course_teacher, $course_type, $course_status, $course_hash, $category_id, $author, $ip, $time, $status_show)
    {
        $query = $this->Query("INSERT INTO `courses`(`course_title`, `course_description`, `course_price`, `course_image`, `course_demo_video_type`, `course_demo_video`, `course_level`, `course_labels`, `course_teacher`, `course_type`, `course_status`, `course_hash`, `category_id`, `author`, `ip`, `create_time`, `status_show`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [$course_title, $course_description, $course_price, $course_image, $course_demo_video_type, $course_demo_video, $course_level, $course_labels, $course_teacher, $course_type, $course_status, $course_hash, $category_id, $author, $ip, $time, $status_show]);
        return $query;
    }

    public function add_file($course_title, $course_file, $course_time, $course_type, $course_part, $course_id, $author, $ip, $time, $status_show)
    {
        $query = $this->Query("INSERT INTO `course_files`(`course_title`, `course_file`, `course_time`, `course_type`, `number_part`, `course_id`, `author`, `ip`, `create_time`, `status_show`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [$course_title, $course_file, $course_time, $course_type, $course_part, $course_id, $author, $ip, $time, $status_show]);
        return $query;
    }

    public function edit_file($course_title, $course_time, $course_number, $course_type, $file_name, $time, $id)
    {
        $query = $this->Query("UPDATE `course_files` SET `course_title` = ?, `course_file` = ?, `course_time` = ?, `course_type` = ?, `number_part` = ?, `update_time` = ? WHERE `id` = ?", [$course_title, $file_name, $course_time, $course_type, $course_number, $time, $id]);
        return $query;
    }

    public function get_number_part()
    {
        $get_number_part = $this->Select("SELECT `number_part` FROM `course_files` ORDER BY `id` DESC", null, 'fetch');
        $number_part = 1;
        if (empty($get_number_part)):
            return $number_part;
        else:
            return $get_number_part->number_part + 1;
        endif;
    }

    public function edit($course_name, $course_labels, $course_category, $course_level, $course_status, $course_type, $course_price, $course_description, $course_video_demo, $course_image, $time, $id)
    {
        $query = $this->Query("UPDATE `courses` SET `course_title` = ?, `course_labels` = ?, `category_id` = ?, `course_level` = ?, `course_status` = ?, `course_type` = ?, `course_price` = ?, `course_description` = ?, `course_demo_video` = ?, `course_image` = ?, `update_time` = ? WHERE `id` = ?", [$course_name, $course_labels, $course_category, $course_level, $course_status, $course_type, $course_price, $course_description, $course_video_demo, $course_image, $time, $id]);
        return $query;
    }
}