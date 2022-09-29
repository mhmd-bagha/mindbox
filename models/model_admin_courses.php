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
}