<?php
require dirname(dirname(__DIR__)) . '/core/Model.php';
require dirname(dirname(__DIR__)) . '/core/config.php';
require dirname(dirname(__DIR__)) . '/core/bootstrap.php';

class Create_db extends Db
{
    public $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function Create()
    {
        return $this->db->CreateDB('db_mindbox');
    }
}

$Create_db = new Create_db();
$Create = $Create_db->Create();
if ($Create)
    echo "successful create db";
else
    echo "can't create db";