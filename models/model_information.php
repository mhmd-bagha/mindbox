<?php

class model_information extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($information_type, $status_show = 'show'){
        $query = $this->Select("SELECT * FROM `information` WHERE `information_type` = ? AND `status_show` = ?", [$information_type, $status_show], 'fetch');
        return $query;
    }

    public function getAllUser($information_type, $status_show = 'show'){
        $query = $this->Select("SELECT * FROM `information` WHERE `information_type` = ? AND `status_show` = ?", [$information_type, $status_show]);
        return $query;
    }

    public function getAll($information_type){
        $query = $this->Select("SELECT * FROM `information` WHERE `information_type` = ?", [$information_type]);
        return $query;
    }
}