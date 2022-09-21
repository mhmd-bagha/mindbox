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
}