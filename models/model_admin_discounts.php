<?php
require DIR_ROOT . 'vendor/autoload.php';

class model_admin_discounts extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_discount()
    {
        $status_show = 'show';
        $query = $this->Select("SELECT * FROM `courses` WHERE `status_show` = ? AND `course_discount` IS NOT NULL", [$status_show]);
        return $query;
    }
}