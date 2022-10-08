<?php
require DIR_ROOT . 'vendor/autoload.php';

class model_admin_discounts extends Model
{
    protected $table = 'discounts';

    public function __construct()
    {
        parent::__construct();
    }

    public function add($courses_id, $discount, $time_start, $time_end, $author, $ip, $status_show, $time)
    {
        foreach ($courses_id as $course_id) {
            $query = $this->Query("INSERT INTO `discounts`(`course_id`, `discount`, `time_start`, `time_end`, `author`, `ip`, `create_time`, `status_show`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)", [$course_id, $discount, $time_start, $time_end, $author, $ip, $time, $status_show]);
        }
        return $query;
    }

    public function get_courses()
    {
        $status_show = 'show';
        $course_type = 'money';
        $query = $this->Select("SELECT * FROM `courses` WHERE `status_show` = ? AND `course_type` = ? AND `course_discount` IS NULL", [$status_show, $course_type]);
        return $query;
    }

    public function deleteDiscount($discount)
    {
        return $this->Query("UPDATE `courses` SET `course_discount` = ? WHERE `id` = ?", [null, $discount]);
    }
}