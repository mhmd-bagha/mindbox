<?php

class model_admin_information extends Model
{
    protected $table = 'information';

    public function __construct()
    {
        parent::__construct();
    }

    public function add($information_type, $information_data, $ip, $time, $status_show): bool
    {
        $query = $this->Query("INSERT INTO `information`(`information_type`, `information_data`, `ip`, `create_time`, `status_show`) VALUES (?, ?, ?, ?, ?)", [$information_type, $information_data, $ip, $time, $status_show]);
        return (bool)$query;
    }

    public function get($information_type)
    {
        $query = $this->Select("SELECT * FROM `information` WHERE `information_type` = ?", [$information_type], 'fetch');
        return $query;
    }

    public function getAll($information_type)
    {
        $query = $this->Select("SELECT * FROM `information` WHERE `information_type` = ?", [$information_type]);
        return $query;
    }

    public function update_web($update, $information_type, $information_data = '', $ip = '', $time = '', $status_show = 'show')
    {
        switch ($update) {
            case "true":
                return $this->Query("INSERT INTO `information` (`information_type`, `information_data`, `ip`, `create_time`, `status_show`) VALUES (?, ?, ?, ?, ?)", [$information_type, $information_data, $ip, $time, $status_show]);
                break;
            case "false":
                return $this->Query("DELETE FROM `information` WHERE `information_type` = ?", [$information_type]);
                break;
        }
    }

    public function exist_story_count()
    {
        $query = $this->Select("SELECT * FROM `stories`", null, 'fetchAll', PDO::FETCH_ASSOC, true);
        return $query;
    }

    public function exist_benefits_count()
    {
        $information_type = 'benefits';
        $query = $this->Select("SELECT * FROM `information` WHERE `information_type` = ?", [$information_type], 'fetchAll', PDO::FETCH_ASSOC, true);
        return $query;
    }

    public function story_add($title, $description, $ip, $time, $status_show)
    {
        $query = $this->Query("INSERT INTO `stories`(`stories_title`, `stories_description`, `ip`, `create_time`, `status_show`) VALUES (?, ?, ?, ?, ?)", [$title, $description, $ip, $time, $status_show]);
        return $query;
    }

    public function benefits_add($type, $data, $ip, $time, $status)
    {
        $query = $this->Query("INSERT INTO `information`(`information_type`, `information_data`, `ip`, `create_time`, `status_show`) VALUES (?, ?, ?, ?, ?)", [$type, $data, $ip, $time, $status]);
        return $query;
    }

    public function header($type, $data, $ip, $time, $status)
    {
        if ($this->headerExist() == 1)
            $query = $this->Query("UPDATE `information` SET `information_data` = ?, `update_time` = ? WHERE `information_type` = ?", [$data, $time, $type]);
        else
            $query = $this->Query("INSERT INTO `information` (`information_type`, `information_data`, `ip`, `create_time`, `status_show`) VALUES (?, ?, ?, ?, ?)", [$type, $data, $ip, $time, $status]);
        return $query;
    }

    private function headerExist()
    {
        $type = 'header';
        $query = $this->Select("SELECT * FROM `information` WHERE `information_type` = ?", [$type], 'fetchAll', PDO::FETCH_OBJ, true);
        return $query;
    }
}