<?php

class model_cart extends Model
{
    protected $table = 'cart';

    public function __construct()
    {
        parent::__construct();
    }

    public function add($courses_id, $user_id, $status, $ip, $create_time)
    {
        $sql = $this->Query("INSERT INTO `cart` (`courses_id`, `user_id`, `status`, `ip`, `create_time`) VALUES (?, ?, ?, ?, ?)", [$courses_id, $user_id, $status, $ip, $create_time]);
        return ($sql) ? true : false;
    }

    public function update($courses_id, $user_id, $status, $update_time){
        $sql = $this->Query("UPDATE `cart` SET `courses_id` = ?, `update_time` = ? WHERE `user_id` = ? AND `status` = ?", [$courses_id, $update_time, $user_id, $status]);
        return ($sql) ? true : false;
    }

    public function cart($user_id, $status = 'waiting'){
        $query = $this->Select("SELECT * FROM `cart` WHERE `user_id` = ? AND `status` = ?", [$user_id, $status], 'fetch');
        return $query;
    }
}