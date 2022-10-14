<?php

class model_menu extends Model
{
    protected $table = 'menu';

    public function __construct()
    {
        parent::__construct();
    }

    public function add($manu_name, $menu_address, $status_show, $create_time): bool
    {
        $query = $this->Query("INSERT INTO `menu`(`menu_name`, `menu_address`, `status_show`, `create_time`) VALUES(?, ?, ?, ?)", [$manu_name, $menu_address, $status_show, $create_time]);
        return (bool)$query;
    }

    public function edit($menu_name, $menu_address, $time, $id)
    {
        $query = $this->Query("UPDATE `menu` SET `menu_name` = ?, `menu_address` = ?, `update_time` = ? WHERE `id` = ?", [$menu_name, $menu_address, $time, $id]);
        return $query;
    }
}