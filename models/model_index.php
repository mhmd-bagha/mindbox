<?php

class model_index extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function sliders($status_show = 'show')
    {
        $query = $this->Select("SELECT * FROM `sliders` WHERE `status_show` = ?", [$status_show]);
        return ($query) ? $query : false;
    }

    public function categories($status_show = 'show')
    {
        $query = $this->Select("SELECT * FROM `categories` WHERE `status_show` = ?", [$status_show]);
        return ($query) ? $query : false;
    }

    public function users_count()
    {
        $query = $this->Select("SELECT * FROM `users`", null, 'fetchAll', PDO::FETCH_OBJ, true);
        return ($query) ? $query : 0;
    }

    public function courses_count()
    {
        $query = $this->Select("SELECT * FROM `courses`", null, 'fetchAll', PDO::FETCH_OBJ, true);
        return ($query) ? $query : 0;
    }

    public function courses_min_all()
    {
        $status_show = 'show';
        $query = $this->Select("SELECT TIME_TO_SEC(course_time) FROM `course_files` WHERE `status_show` = ?", [$status_show], 'fetchAll', PDO::FETCH_ASSOC);
        return $query;
    }

    public function course_offer()
    {
        $course_offer = 'on';
        $status_show = 'show';
        $query = $this->Select("SELECT * FROM `courses` WHERE `course_offer` = ? OR `course_offer` IS NULL AND `status_show` = ? ORDER BY `id` DESC LIMIT 10", [$course_offer, $status_show]);
        return ($query) ? $query : false;
    }

    public function course_discounts()
    {
        $course_discounts = 'on';
        $status_show = 'show';
        $query = $this->Select("SELECT * FROM `courses` WHERE `course_discounts` = ? OR `course_discounts` IS NULL AND `course_discount` IS NOT NULL AND `status_show` = ? ORDER BY `id` DESC LIMIT 10", [$course_discounts, $status_show]);
        return ($query) ? $query : false;
    }

    public function course_last()
    {
        $course_last = 'on';
        $status_show = 'show';
        $query = $this->Select("SELECT * FROM `courses` WHERE `course_last` = ? OR `course_last` IS NULL  AND `status_show` = ? ORDER BY `id` DESC LIMIT 10", [$course_last, $status_show]);
        return ($query) ? $query : false;
    }
}