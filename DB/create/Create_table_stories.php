<?php
require dirname(dirname(__DIR__)) . '/core/Model.php';
require dirname(dirname(__DIR__)) . '/core/config.php';
require dirname(dirname(__DIR__)) . '/core/bootstrap.php';

class Create_table_stories extends Db
{
    public $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function Create()
    {
        return $this->db->CreateTable('stories', [
            "
            id INT(11) AUTO_INCREMENT,
            stories_title VARCHAR(255) NOT NULL,
            stories_description VARCHAR(2500) NOT NULL,
            ip VARCHAR(255) NOT NULL,
            create_time VARCHAR(50) NOT NULL,
            update_time VARCHAR(50) NULL,
            status_show ENUM('show', 'hide') NOT NULL,
            PRIMARY KEY (id)
            "
        ]);
    }
}

$Create_db = new Create_table_stories();
$Create = $Create_db->Create();
if ($Create == true)
    echo "successful create table";
else
    echo "can't create table";