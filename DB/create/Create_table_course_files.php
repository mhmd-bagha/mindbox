<?php
require dirname(dirname(__DIR__)) . '/core/Model.php';
require dirname(dirname(__DIR__)) . '/core/config.php';
require dirname(dirname(__DIR__)) . '/core/bootstrap.php';

class Create_table_course_files extends Db
{
    public $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function Create()
    {
        return $this->db->CreateTable('course_files', [
            "
            id INT(11) AUTO_INCREMENT,
            course_title VARCHAR(255) NOT NULL,
            course_file VARCHAR(1000) NOT NULL,
            course_time VARCHAR(50) NOT NULL,
            course_type ENUM('lock', 'free') NOT NULL,
            number_part VARCHAR(11) NOT NULL,
            course_id VARCHAR(11) NOT NULL,
            author VARCHAR(255) NOT NULL,
            ip VARCHAR(255) NOT NULL,
            create_time VARCHAR(50) NOT NULL,
            update_time VARCHAR(50) NULL,
            status_show ENUM('show', 'hide') NOT NULL,
            PRIMARY KEY (id)
            "
        ]);
    }
}

$Create_db = new Create_table_course_files();
$Create = $Create_db->Create();
if ($Create == true)
    echo "successful create table";
else
    echo "can't create table";