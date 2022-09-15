<?php
require dirname(dirname(__DIR__)) . '/core/Model.php';
require dirname(dirname(__DIR__)) . '/core/config.php';

class Create_table_admins extends Db
{
    public $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function Create()
    {
        return $this->db->CreateTable('admins', [
            "
            id INT(11) AUTO_INCREMENT,
            first_name VARCHAR(500) NULL,
            last_name VARCHAR(500) NULL,
            admin_email VARCHAR(500) NOT NULL,
            admin_password VARCHAR(1000) NOT NULL,
            ip VARCHAR(255) NOT NULL,
            create_time VARCHAR(50) NOT NULL,
            update_time VARCHAR(50) NULL,
            PRIMARY KEY (id)
            "
        ]);
    }
}

$Create_db = new Create_table_admins();
$Create = $Create_db->Create();
if ($Create == true)
    echo "successful create table";
else
    echo "can't create table";