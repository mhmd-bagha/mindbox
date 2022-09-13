<?php
require dirname(dirname(__DIR__)) . '/core/Model.php';
require dirname(dirname(__DIR__)) . '/core/config.php';

class Create_table_courses extends Db
{
    public $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function Create()
    {
        return $this->db->CreateTable('courses', [
            "
            id INT(11) AUTO_INCREMENT,
            course_title VARCHAR(255) NOT NULL,
            course_description LONGTEXT NOT NULL,
            course_price VARCHAR(11) NULL,
            course_image VARCHAR(1000) NOT NULL,
            course_demo_video_type ENUM('internal_video', 'external_video') NOT NULL,
            course_demo_video VARCHAR(1000) NOT NULL,
            course_discount VARCHAR(11) NULL,
            course_level ENUM('preliminary', 'medium', 'advanced') NOT NULL,
            course_labels VARCHAR(5000) NOT NULL,
            course_teacher VARCHAR(255) NOT NULL,
            course_type ENUM('free', 'money') NOT NULL,
            course_status ENUM('performing', 'finished', 'stopped') NOT NULL,
            course_hash VARCHAR(500) NOT NULL,
            course_offer ENUM('on', 'off') NULL,
            course_discounts ENUM('on', 'off') NULL,
            course_last ENUM('on', 'off') NULL,
            category_id VARCHAR(11) NOT NULL,
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

$Create_db = new Create_table_courses();
$Create = $Create_db->Create();
if ($Create == true)
    echo "successful create table";
else
    echo "can't create table";