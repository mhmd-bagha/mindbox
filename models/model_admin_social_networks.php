<?php

class model_admin_social_networks extends Model
{
    protected $table = 'social_networks';

    public function __construct()
    {
        parent::__construct();
    }

    public function add($network_name, $network_address, $network_icon, $ip, $time, $status_show)
    {
        $query = $this->Query("INSERT INTO `social_networks`(`network_name`, `network_address`, `network_icon`, `ip`, `create_time`, `status_show`) VALUES (?, ?, ?, ?, ?, ?)", [$network_name, $network_address, $network_icon, $ip, $time, $status_show]);
        return (bool)$query;
    }

    public function edit($network_name, $network_address, $network_icon, $time, $id)
    {
        $query = $this->Query("UPDATE `social_networks` SET `network_name` = ?, `network_address` = ?, `network_icon` = ?, `update_time` = ? WHERE `id` = ?", [$network_name, $network_address, $network_icon, $time, $id]);
        return $query;
    }
}