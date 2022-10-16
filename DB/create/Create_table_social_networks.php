<?php
require dirname(dirname(__DIR__)) . '/core/Model.php';
require dirname(dirname(__DIR__)) . '/core/config.php';
require dirname(dirname(__DIR__)) . '/core/bootstrap.php';

class Create_table_social_networks extends Db
{
    public $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function Create()
    {
        return $this->db->CreateTable('social_networks', [
            "
            id INT(11) AUTO_INCREMENT,
            network_name VARCHAR(100) NOT NULL,
            network_address VARCHAR(255) NOT NULL,
            network_icon VARCHAR(50) NOT NULL,
            ip VARCHAR(255) NOT NULL,
            create_time VARCHAR(50) NOT NULL,
            update_time VARCHAR(50) NULL,
            status_show ENUM('show', 'hide') NOT NULL,
            PRIMARY KEY (id)
            "
        ]);
    }
}

$Create_db = new Create_table_social_networks();
$Create = $Create_db->Create();
if ($Create == true)
    echo "successful create table";
else
    echo "can't create table";