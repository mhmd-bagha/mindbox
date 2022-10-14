<?php

class model_checkout extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_factor($user_id, $course_id, $factor_type, $factor_price, $status, $factor_number, $ip, $time, $factor_payment)
    {
        $query = $this->Query("INSERT INTO `factors`(`user_id`, `courses_id`, `factor_type`, `factor_price`, `factor_status`, `factor_number`, `factor_payment`, `ip`, `create_time`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)", [$user_id, $course_id, $factor_type, $factor_price, $status, $factor_number, $factor_payment, $ip, $time]);
        return $query;
    }

    public function add_payment($payment_order, $authority, $status_number, $status, $payment_number, $courses_id, $user_id, $ip, $create_time, $payment_type = 'courses')
    {
        $query = $this->Query("INSERT INTO `payment`(`payment_order`, `authority`, `status_number`, `status`, `payment_number`, `payment_type`, `courses_id`, `user_id`, `ip`, `create_time`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [$payment_order, $authority, $status_number, $status, $payment_number, $payment_type, $courses_id, $user_id, $ip, $create_time]);
        return $query;
    }

    public function update_payment($status_number, $status, $ref_id, $update_time, $authority)
    {
        $query = $this->Query("UPDATE `payment` SET `status_number` = ?, `status` = ?, `ref_id` = ?, `update_time` = ? WHERE `authority` = ?", [$status_number, $status, $ref_id, $update_time, $authority]);
        return $query;
    }

    public function update_factor($factor_status, $authority)
    {
        $query = $this->Query("UPDATE `factors` SET `factor_status` = ? WHERE `factor_number` = ?", [$factor_status, $authority]);
        return $query;
    }

    public function update_cart($status_replace, $status, $user_id)
    {
        $query = $this->Query("UPDATE `cart` SET `status` = ? WHERE `status` = ? AND `user_id` = ?", [$status_replace, $status, $user_id]);
        return $query;
    }

    public function update_wallet($user_money, $user_id)
    {
        $query = $this->Query("UPDATE `users` SET `user_money` = ? WHERE `id` = ?", [$user_money, $user_id]);
        return $query;
    }
}