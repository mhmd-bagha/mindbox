<?php

class model_account extends Model
{
    protected $table = 'users';
    public function __construct()
    {
        parent::__construct();
    }

    public function count_my_course(){}

    public function information_edit($name, $family, $phone_number, $email){
        $sql = "UPDATE `users` SET first_name = ?, last_name = ?, phone_mobile = ? WHERE user_email = ?";
        $query = $this->Query($sql, [$name, $family, $phone_number, $email]);
        if ($query == true){
            echo json_encode( 
                [
                    "status" => "success",
                    "message" => "با موفقیت تغییرات ثبت گردید!"
                ]
            );
        }else{
            echo json_encode(
                [
                    "status" => "error",
                    "message" => "مشکلی پیش آمد!",
                ]
            );
        }
        return ($query) ? true : false;
    }
}