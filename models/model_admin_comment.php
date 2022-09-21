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
}