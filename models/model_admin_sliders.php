<?php

class model_admin_sliders extends Model
{
    protected $table = 'sliders';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_slider_id($id)
    {
         $query = $this->Select("SELECT * FROM `sliders` WHERE `id` = ?", [$id]);
        return $query;
    }
}