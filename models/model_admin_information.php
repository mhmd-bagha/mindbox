<?php

class model_admin_information extends Model
{
    protected $table = 'information';

    public function __construct()
    {
        parent::__construct();
    }

    public function add($information_type, $information_data, $ip, $time, $status_show): bool
    {
        $query = $this->Query("INSERT INTO `information`(`information_type`, `information_data`, `ip`, `create_time`, `status_show`) VALUES (?, ?, ?, ?, ?)", [$information_type, $information_data, $ip, $time, $status_show]);
        return (bool)$query;
    }

    public function get($information_type){
        $query = $this->Select("SELECT * FROM `information` WHERE `information_type` = ?", [$information_type], 'fetch');
        return $query;
    }

    public function getAll($information_type){
        $query = $this->Select("SELECT * FROM `information` WHERE `information_type` = ?", [$information_type]);
        return $query;
    }
}