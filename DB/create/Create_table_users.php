<?php
require dirname(dirname(__DIR__)) . '/core/Model.php';
require dirname(dirname(__DIR__)) . '/core/config.php';

class Create_table_users extends Db
{
    public $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function Create()
    {
        return $this->db->CreateTable('users', [
            "
            id INT(11) AUTO_INCREMENT,
            first_name VARCHAR(255) NOT NULL,
            last_name VARCHAR(255) NOT NULL,
            phone_mobile VARCHAR(11) NOT NULL,
            user_email VARCHAR(500) NOT NULL,
            user_password VARCHAR(1000) NOT NULL,
            user_status ENUM('disable', 'enable') DEFAULT 'disable',
            user_money VARCHAR(255) DEFAULT 0,
            user_image VARCHAR(500) NULL,
            user_hash VARCHAR(500) NOT NULL,
            user_agent VARCHAR(1000) NOT NULL,
            ip VARCHAR(255) NOT NULL,
            create_time VARCHAR(50) NOT NULL,
            PRIMARY KEY (id)
            "
        ]);
    }
}

$Create_db = new Create_table_users();
$Create = $Create_db->Create();
if ($Create == true)
    echo "successful create table";
else
    echo "can't create table";