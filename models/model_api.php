<?php

class model_api extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function exist_user_course($user_id, $course_id)
    {
        $query = $this->Select("SELECT * FROM `factors` WHERE `` = ? AND `course_id` = ?", [$user_id, $course_id]);
        return (bool)$query;
    }
}