<?php
require dirname(dirname(__DIR__)) . '/core/Model.php';
require dirname(dirname(__DIR__)) . '/core/config.php';

class Create_table_ticket extends Db
{
    public $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function Create()
    {
        return $this->db->CreateTable('tickets', [
            "
            id INT(11) AUTO_INCREMENT,
            ticket_title VARCHAR(255) NULL,
            ticket_description VARCHAR(2000) NOT NULL,
            ticket_image VARCHAR(1000) NULL,
            ticket_reply VARCHAR(11) NULL,
            ticket_status ENUM('closed', 'waiting', 'answered') NOT NULL,
            ticket_type ENUM('user', 'admin') NOT NULL,
            user_id VARCHAR(11) NULL,
            admin_id VARCHAR(11) NULL,
            ip VARCHAR(255) NOT NULL,
            create_time VARCHAR(50) NOT NULL,
            PRIMARY KEY (id)
            "
        ]);
    }
}

$Create_db = new Create_table_ticket();
$Create = $Create_db->Create();
if ($Create == true)
    echo "successful create table";
else
    echo "can't create table";