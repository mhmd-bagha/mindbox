<?php
require dirname(dirname(__DIR__)) . '/core/Model.php';
require dirname(dirname(__DIR__)) . '/core/config.php';

class Create_table_payment extends Db
{
    public $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function Create()
    {
        return $this->db->CreateTable('payment', [
            "
            id INT(11) AUTO_INCREMENT,
            payment_order VARCHAR(50) NOT NULL,
            authority VARCHAR(1000) NULL,
            status_number VARCHAR(11) NOT NULL,
            status ENUM('waiting', 'paid', 'unsuccessful') NOT NULL,
            ref_id VARCHAR(255) NULL,
            payment_number VARCHAR(1000) NOT NULL,
            payment_type ENUM('courses', 'user_wallet') NOT NULL DEFAULT 'courses',
            courses_id VARCHAR(255) NULL,
            user_id VARCHAR(11) NOT NULL,
            ip VARCHAR(255) NOT NULL,
            create_time VARCHAR(50) NOT NULL,
            update_time VARCHAR(50) NULL,
            PRIMARY KEY (id)
            "
        ]);
    }
}

$Create_db = new Create_table_payment();
$Create = $Create_db->Create();
if ($Create == true)
    echo "successful create table";
else
    echo "can't create table";