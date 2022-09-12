<?php
require dirname(dirname(__DIR__)) . '/core/Model.php';
require dirname(dirname(__DIR__)) . '/core/config.php';

class Create_table_sliders extends Db
{
    public $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function Create()
    {
        return $this->db->CreateTable('sliders', [
            "
            id INT(11) AUTO_INCREMENT,
            slider_title VARCHAR(255) NOT NULL,
            slider_image VARCHAR(1000) NOT NULL,
            slider_link VARCHAR(500) NOT NULL,
            author VARCHAR(255) NOT NULL,
            ip VARCHAR(255) NOT NULL,
            create_time VARCHAR(50) NOT NULL,
            status_show ENUM('show', 'hide') NOT NULL,
            PRIMARY KEY (id)
            "
        ]);
    }
}

$Create_db = new Create_table_sliders();
$Create = $Create_db->Create();
if ($Create == true)
    echo "successful create table";
else
    echo "can't create table";