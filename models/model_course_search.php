<?php

class model_course_search extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function search($value)
    {
        $status_show = 'show';
        $value = "%{$value}%";
        $query = $this->Select("SELECT * FROM `courses` WHERE `course_title` LIKE ? OR `course_labels` LIKE ? AND `status_show` = ?", [$value, $value, $status_show]);
        return ($query) ? $query : false;
    }
}