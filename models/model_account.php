<?php

class model_account extends Model
{
    protected $table = 'users';
    public function __construct()
    {
        parent::__construct();
    }

    public function count_my_course()
    {
    }

    public function information_edit($name, $family, $phone_number, $email)
    {
        $sql = "UPDATE `users` SET first_name = ?, last_name = ?, phone_mobile = ? WHERE user_email = ?";
        $query = $this->Query($sql, [$name, $family, $phone_number, $email]);
        if ($query == true) {
            echo json_encode(
                [
                    "status" => "success",
                    "message" => "با موفقیت تغییرات ثبت گردید!"
                ]
            );
        } else {
            echo json_encode(
                [
                    "status" => "error",
                    "message" => "مشکلی پیش آمد!",
                ]
            );
        }
        return ($query) ? true : false;
    }

    public function change_password($email, $encrypted_current_password, $encrypted_newpassword)
    {
        $check_result = $this->check_password($encrypted_current_password); //check the given current password and the user's password then check if it matches.
        if ($check_result) {
            $sql = "UPDATE `users` SET user_password = ? WHERE user_email = ? AND user_password = ?";
            $query = $this->Query($sql, [$encrypted_current_password, $encrypted_newpassword, $email, $encrypted_current_password]);

            if ($query) {
                echo json_encode([
                    "status" => "success",
                    "message" => "با موفقیت پسورد عوض شد!"
                ]);
            } else {
                echo json_encode([
                    "status" => "error",
                    "message" => "عملیات با مشکل مواجه شد."
                ]);
            }
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "پسورد فعلی درست نمی‌باشد."
            ]);
        }
    }

    public function check_password($encrypted_password)
    {
        $sql = "SELECT user_password FROM users WHERE user_password = ?";
        $result = $this->Query($sql, [$encrypted_password]);
        return $result;
    }
}
