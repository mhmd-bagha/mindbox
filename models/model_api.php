<?php

class model_api extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function is_course_discount($course_id)
    {
        $query = $this->Select("SELECT `id` FROM `courses` WHERE `id` = ? AND `course_discount` IS NOT NULL", [$course_id]);
        return $query;
    }

    public function discounts($courses_id, $type_discount)
    {
        switch ($type_discount) {
            case "start":
                foreach ($courses_id as $course_ids)
                    foreach ($course_ids as $course_id => $discount)
                        $query = $this->Query("UPDATE `courses` SET `course_discount` = ? WHERE `id` = ? AND `course_discount` IS NULL", [$discount, $course_id]);
                break;
            case "end":
                $discount = null;
                foreach ($courses_id as $course_id)
                    $query = $this->Query("UPDATE `courses` SET `course_discount` = ? WHERE `id` = ?", [$discount, $course_id]);
                break;
        }
        return $query;
    }
}