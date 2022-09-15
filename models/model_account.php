<?php

class model_account extends Model
{
    protected $table = 'users';

    public function __construct()
    {
        parent::__construct();
    }

    public function count_my_course($user_id, $factor_status)
    {
        $query = $this->Select("SELECT `courses_id` FROM `factors` WHERE `user_id` = ? AND `factor_status` = ?", [$user_id, $factor_status]);
        return $query;
    }

    public function my_factors($user_id, $factor_status)
    {
        $query = $this->Select("SELECT * FROM `factors` WHERE `user_id` = ? AND `factor_status` = ?", [$user_id, $factor_status]);
        return $query;
    }

    public function my_cart($user_id, $factor_status)
    {
        $query = $this->Select("SELECT * FROM `cart` WHERE `user_id` = ? AND `status` = ?", [$user_id, $factor_status]);
        return $query;
    }

    public function my_courses($id)
    {
        $query = $this->Select("SELECT `id`, `course_title`, `create_time` FROM `courses` WHERE `id` = ?", [$id]);
        return $query;
    }
}