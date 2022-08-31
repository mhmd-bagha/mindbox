<?php

class model_courses extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCourse($id, $status_show = 'show')
    {
        $query = $this->Select("SELECT * FROM `courses` WHERE `id` = ? AND `status_show` = ?", [$id, $status_show]);
        return ($query) ? $query : false;
    }

    public function courses($status_show = 'show')
    {
        $query = $this->Select("SELECT * FROM `courses` WHERE `status_show` = ? ORDER BY `id` DESC", [$status_show]);
        return ($query) ? $query : false;
    }

    public function category($id, $status_show = 'show')
    {
        $query = $this->Select("SELECT * FROM `courses` WHERE `category_id` = ? AND `status_show` = ? ORDER BY `id` DESC", [$id, $status_show]);
        return ($query) ? $query : false;
    }

    public function get_category($id, $status_show = 'show')
    {
        $query = $this->Select("SELECT * FROM `categories` WHERE `id` = ? AND `status_show` = ? ORDER BY `id` DESC", [$id, $status_show]);
        return ($query) ? $query : false;
    }

    public function count_course_files($course_id, $status_show = 'show')
    {
        $query = $this->Select("SELECT * FROM `course_files` WHERE `course_id` = ? AND `status_show` = ?", [$course_id, $status_show], 'fetchAll', PDO::FETCH_OBJ, true);
        return ($query) ? $query : 0;
    }

    public function get_course_file($course_id, $status_show = 'show')
    {
        $query = $this->Select("SELECT * FROM `course_files` WHERE `course_id` = ? AND `status_show` = ?", [$course_id, $status_show]);
        return ($query) ? $query : false;
    }
}