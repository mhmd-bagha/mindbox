<?php
require dirname(dirname(__DIR__)) . '/core/Model.php';
require dirname(dirname(__DIR__)) . '/core/config.php';

class Create_table_comment extends Db
{
    public $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function Create()
    {
        return $this->db->CreateTable('comments', [
            "
            id INT(11) AUTO_INCREMENT,
            course_id VARCHAR(11) NOT NULL,
            comment_text VARCHAR(1000) NOT NULL,
            reply_id VARCHAR(11) NULL,
            user_id VARCHAR(11) NULL,
            comment_type ENUM('user', 'admin') NOT NULL,
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

$Create_db = new Create_table_comment();
$Create = $Create_db->Create();
if ($Create == true)
    echo "successful create table";
else
    echo "can't create table";