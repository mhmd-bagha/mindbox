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

    public function add_ticket($ticket_title, $ticket_description, $ticket_image, $ticket_status, $ticket_type, $user_id, $ip, $create_time)
    {
        $query = $this->Query("INSERT INTO `tickets`(`ticket_title`, `ticket_description`, `ticket_image`, `ticket_status`, `ticket_type`, `user_id`, `ip`, `create_time`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)", [$ticket_title, $ticket_description, $ticket_image, $ticket_status, $ticket_type, $user_id, $ip, $create_time]);
        return ($query) ? true : false;
    }

    public function tickets_all($user_id)
    {
        $query = $this->Select("SELECT * FROM `tickets` WHERE `user_id` = ? AND `ticket_reply` IS NULL ORDER BY `create_time` DESC", [$user_id]);
        return ($query) ? $query : false;
    }

    public function chat_ticket($id)
    {
        $query = $this->Select("SELECT * FROM `tickets` WHERE `id` = ? OR `ticket_reply` = ? ORDER BY `create_time` DESC ", [$id, $id]);
        return $query;
    }

    public function ticket_status($ticket_id, $status)
    {
        $query = $this->Query("UPDATE `tickets` SET `ticket_status` = ? WHERE `id` = ?", [$status, $ticket_id]);
        return (bool)$query;
    }

    public function ticket_answer($ticket_description, $ticket_image, $ticket_status, $ticket_type, $ticket_reply, $user_id, $ip, $create_time)
    {
        $query = $this->Query("INSERT INTO `tickets`(`ticket_description`, `ticket_image`, `ticket_status`, `ticket_type`, `ticket_reply`, `user_id`, `ip`, `create_time`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)", [$ticket_description, $ticket_image, $ticket_status, $ticket_type, $ticket_reply, $user_id, $ip, $create_time]);
        return (bool)$query;
    }

    public function closed_ticket($status, $id, $user_id)
    {
        $query = $this->Query("UPDATE `tickets` SET `ticket_status` = ? WHERE `id` = ? AND `user_id` = ?", [$status, $id, $user_id]);
        return (bool)$query;
    }
}