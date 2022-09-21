<?php
require dirname(dirname(__DIR__)) . '/core/Model.php';
require dirname(dirname(__DIR__)) . '/core/config.php';

class Create_table_menu extends Db
{
    public $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function Create()
    {
        return $this->db->CreateTable('menu', [
            "
            id INT(11) AUTO_INCREMENT,
            menu_name VARCHAR(255) NOT NULL,
            menu_address VARCHAR(1000) NOT NULL,
            status_show ENUM('show', 'hide') NOT NULL,
            create_time VARCHAR(50) NOT NULL,
            update_time VARCHAR(50) NULL,
            PRIMARY KEY (id)
            "
        ]);
    }
}

$Create_db = new Create_table_menu();
$Create = $Create_db->Create();
if ($Create == true)
    echo "successful create table";
else
    echo "can't create table";