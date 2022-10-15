<?php

class model_courses extends Model
{
    protected $table = 'courses';

    public function __construct()
    {
        parent::__construct();
    }

    public function getCourse($id, $status_show = 'show')
    {
        $query = $this->Select("SELECT * FROM `courses` WHERE `id` = ?", [$id]);
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

    public function get_comments($course_id, $status_show = 'show')
    {
        $query = $this->Select("SELECT * FROM `comments` WHERE `reply_id` IS NULL AND `course_id` = ? AND `status_show` = ? ORDER BY id DESC", [$course_id, $status_show]);
        return ($query) ? $query : false;
    }

    public function get_reply_comment($reply_id)
    {
        $status_show = 'show';
        $query = $this->Select("SELECT * FROM `comments` WHERE `reply_id` = ? AND `status_show` = ?", [$reply_id, $status_show]);
        return ($query) ? $query : false;
    }

    public function comment($course_id, $user_id, $comment, $comment_type, $ip, $status_show, $create_time)
    {
        $query = $this->Query("INSERT INTO `comments`(`course_id`, `comment_text`, `comment_type`, `user_id`, `author`, `ip`, `create_time`, `status_show`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)", [$course_id, $comment, $comment_type, $user_id, $user_id, $ip, $create_time, $status_show]);
        return ($query) ? true : false;
    }

    public function filter($type, $order, $discount, $level, $category)
    {
        $status_show = 'show';
        if (empty($category)) {
            if (!empty($type)) :
                if ($type != 'all')
                    $query = $this->Select("SELECT * FROM `courses` WHERE `course_type` = ? AND `status_show` = ? ORDER BY `id` DESC", [$type, $status_show]);
                else
                    $query = $this->Select("SELECT * FROM `courses` WHERE `status_show` = ? ORDER BY `id` DESC", [$status_show]);
            endif;
            if (!empty($order))
                $query = $this->Select("SELECT * FROM `courses` WHERE `status_show` = ? ORDER BY `id` {$order}", [$status_show]);
            if (!empty($discount))
                $query = $this->Select("SELECT * FROM `courses` WHERE `course_discount` IS NOT NULL AND `status_show` = ? ORDER BY `id` DESC", [$status_show]);
            if (!empty($level)) :
                if ($level != 'all')
                    $query = $this->Select("SELECT * FROM `courses` WHERE `course_level` = ? AND `status_show` = ? ORDER BY `id` DESC", [$level, $status_show]);
                else
                    $query = $this->Select("SELECT * FROM `courses` WHERE `status_show` = ? ORDER BY `id` DESC", [$status_show]);
            endif;
        } else {
            if (!empty($type)) :
                if ($type != 'all')
                    $query = $this->Select("SELECT * FROM `courses` WHERE `category_id` = ? AND `course_type` = ? AND `status_show` = ? ORDER BY `id` DESC", [$category, $type, $status_show]);
                else
                    $query = $this->Select("SELECT * FROM `courses` WHERE `category_id` = ? AND `status_show` = ? ORDER BY `id` DESC", [$category, $status_show]);
            endif;
            if (!empty($order))
                $query = $this->Select("SELECT * FROM `courses` WHERE `category_id` = ? AND `status_show` = ? ORDER BY `id` {$order}", [$category, $status_show]);
            if (!empty($discount))
                $query = $this->Select("SELECT * FROM `courses` WHERE `category_id` = ? AND `course_discount` IS NOT NULL AND `status_show` = ? ORDER BY `id` DESC", [$category, $status_show]);
            if (!empty($level)) :
                if ($level != 'all')
                    $query = $this->Select("SELECT * FROM `courses` WHERE `category_id` = ? AND `course_level` = ? AND `status_show` = ? ORDER BY `id` DESC", [$category, $level, $status_show]);
                else
                    $query = $this->Select("SELECT * FROM `courses` WHERE `category_id` = ? AND `status_show` = ? ORDER BY `id` DESC", [$category, $status_show]);
            endif;
        }
        return $query;
    }
}