<?php
require dirname(dirname(__DIR__)) . '/core/Model.php';
require dirname(dirname(__DIR__)) . '/core/config.php';

class Create_table_factors extends Db
{
    public $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function Create()
    {
        return $this->db->CreateTable('factors', [
            "
            id INT(11) AUTO_INCREMENT,
            user_id VARCHAR(11) NOT NULL,
            courses_id VARCHAR(255) NOT NULL,
            factor_type ENUM('money', 'free') NOT NULL,
            factor_price VARCHAR(500) NULL,
            factor_status ENUM('waiting', 'paid', 'unsuccessful') NOT NULL,
            factor_number VARCHAR(1000) NOT NULL,
            factor_payment ENUM('zarinpal', 'wallet') NOT NULL,
            ip VARCHAR(255) NOT NULL,
            create_time VARCHAR(50) NOT NULL,
            update_time VARCHAR(50) NULL,
            PRIMARY KEY (id)
            "
        ]);
    }
}

$Create_db = new Create_table_factors();
$Create = $Create_db->Create();
if ($Create == true)
    echo "successful create table";
else
    echo "can't create table";