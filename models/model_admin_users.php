<?php

class model_admin_users extends Model
{
    protected $table = 'users';

    public function __construct()
    {
        parent::__construct();
    }

    public function end_users()
    {
        $query = $this->Select("SELECT * FROM `users` ORDER BY `create_time` DESC LIMIT 5");
        return $query;
    }

    public function user_money($user_id){
        $query = $this->Select("SELECT `user_money` FROM `users` WHERE `id` = ?", [$user_id], 'fetch');
        return $query;
    }

    public function replace_wallet($user_id, $price_wallet){
        $query = $this->Query("UPDATE `users` SET `user_money` = ? WHERE `id` = ?", [$price_wallet, $user_id]);
        return (bool)$query;
    }
}