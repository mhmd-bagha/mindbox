<?php

class model_admin_ticket extends Model
{
    protected $table = 'tickets';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_tickets($ticket_type = 'user')
    {
        $query = $this->Select("SELECT * FROM `tickets` WHERE `ticket_type` = ? AND `ticket_reply` IS NULL", [$ticket_type]);
        return $query;
    }

    public function get_ticket($ticket_id)
    {
        $query = $this->Select("SELECT * FROM `tickets` WHERE `id` = ? OR `ticket_reply` = ? ORDER BY `create_time` DESC ", [$ticket_id, $ticket_id]);
        return $query;
    }

    public function ticket_status($ticket_id, $status)
    {
        $query = $this->Query("UPDATE `tickets` SET `ticket_status` = ? WHERE `id` = ?", [$status, $ticket_id]);
        return (bool)$query;
    }

    public function ticket_answer($ticket_description, $ticket_image, $ticket_status, $ticket_type, $ticket_reply, $admin_id, $ip, $create_time)
    {
        $query = $this->Query("INSERT INTO `tickets`(`ticket_description`, `ticket_image`, `ticket_status`, `ticket_type`, `ticket_reply`, `admin_id`, `ip`, `create_time`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)", [$ticket_description, $ticket_image, $ticket_status, $ticket_type, $ticket_reply, $admin_id, $ip, $create_time]);
        return (bool)$query;
    }

    public function count_all_ticket()
    {
        $ticket_type = 'user';
        $query = $this->Select("SELECT * FROM `tickets` WHERE `ticket_type` = ? AND `ticket_reply` IS NULL", [$ticket_type], 'fetch', PDO::FETCH_OBJ, true);
        return $query;
    }
}