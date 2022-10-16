<?php
require dirname(dirname(__DIR__)) . '/core/Model.php';
require dirname(dirname(__DIR__)) . '/core/config.php';
require dirname(dirname(__DIR__)) . '/core/bootstrap.php';

class Create_table_cart extends Db
{
    public $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function Create()
    {
        return $this->db->CreateTable('cart', [
            "
            id INT(11) AUTO_INCREMENT,
            courses_id VARCHAR(255) NOT NULL,
            status ENUM('waiting', 'paid', 'unsuccessful') NOT NULL,
            user_id VARCHAR(11) NOT NULL,
            ip VARCHAR(255) NOT NULL,
            create_time VARCHAR(50) NOT NULL,
            update_time VARCHAR(50) NULL,
            PRIMARY KEY (id)
            "
        ]);
    }
}

$Create_db = new Create_table_cart();
$Create = $Create_db->Create();
if ($Create == true)
    echo "successful create table";
else
    echo "can't create table";