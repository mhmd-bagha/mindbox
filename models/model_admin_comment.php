<?php

class model_admin_comment extends Model
{
    protected $table = 'comments';

    public function __construct()
    {
        parent::__construct();
    }

    public function end_comments($comment_type = 'user')
    {
        $query = $this->Select("SELECT * FROM `comments` WHERE `comment_type` = ? AND `reply_id` IS NULL ORDER BY `create_time` DESC LIMIT 5", [$comment_type]);
        return $query;
    }

    public function count_all()
    {
        $query = $this->Select("SELECT * FROM `comments` ORDER BY `create_time` DESC LIMIT 5");
        return $query;
    }

    public function answer($course_id, $comment_text, $reply_id, $comment_type, $author, $ip, $time, $status_show)
    {
        $query = $this->Query("INSERT INTO `comments`(`course_id`, `comment_text`, `reply_id`, `comment_type`, `author`, `ip`, `create_time`, `status_show`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)", [$course_id, $comment_text, $reply_id, $comment_type, $author, $ip, $time, $status_show]);
        return (bool)$query;
    }

    public function edit($comment_text, $reply_id)
    {
        $query = $this->Query("UPDATE `comments` SET `comment_text` = ? WHERE `reply_id` = ?", [$comment_text, $reply_id]);
        return (bool)$query;
    }
}