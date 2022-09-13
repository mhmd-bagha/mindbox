<?php

class checkout extends \Controller
{
    private $zp;
    private $MerchantID = "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx";
    private $Amount = "";
    private $Description = "";
    private $Email = "";
    private $Mobile = "";
    private $CallbackURL = DOMAIN . "/checkout/pay_verify";
    private $ZarinGate = false;
    private $SandBox = true;
    private $result = array();

    public function __construct()
    {
        parent::__construct();
        if (file_exists(DIR_ROOT . 'public/zarinpal/zarinpal_function.php'))
            require_once(DIR_ROOT . 'public/zarinpal/zarinpal_function.php');
        $this->zp = new zarinpal();
    }

    public function request($courses_id)
    {
        $balance_all = 0;
        $balance_all_discount = 0;
        $courses_id = $this->model->decrypt($courses_id);
        $courses_id_implode = $courses_id;
        $courses_id = explode(',', $courses_id);
        foreach ($courses_id as $course_id) {
            $get_course = $this->model->where('courses', 'id', $course_id);
            if (!empty($get_course->course_discount)) {
                $balance_all += ($get_course->course_price - ($get_course->course_price * $get_course->course_discount / 100));
                $balance_all_discount += ($get_course->course_price * $get_course->course_discount / 100);
            } else {
                $balance_all += $get_course->course_price;
            }
        }
        $status = 'waiting';
        $payment_number = $this->model->buildNum('payment', 'payment_number', mt_rand(10000, 999999));
        $factor_number = $this->model->buildNum('factors', 'factor_number', mt_rand(10000, 999999));
        $ip = $_SERVER['REMOTE_ADDR'];
        $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
        $get_user = $this->model->where('users', 'user_email', $this->model->decrypt(Model::SessionGet('user')));
        $user_id = $get_user->id;
        $user_email = $get_user->user_email;
        $user_phone = $get_user->phone_mobile;
        $factor_type = 'money';
        $factor_price = $balance_all;
        $this->Amount = $balance_all;
        $this->Description = "تراکنش خرید دوره مایندباکس. مبلغ $balance_all تومان";
        $this->Mobile = $user_phone;
        $this->Email = $user_email;
        $result = $this->zp->request($this->MerchantID, $this->Amount, $this->CallbackURL, $this->Description, $this->Email, $this->Mobile, $this->SandBox, $this->ZarinGate);
        if (isset($result["Status"]) && $result["Status"] == 100) {
            // Success and redirect to pay
            $this->model->add_factor($user_id, $courses_id_implode, $factor_type, $balance_all, $status, $result['Authority'], $ip, $time);
            $this->model->add_payment($balance_all, $result["Authority"], $result["Status"], $status, $payment_number, $courses_id_implode, $user_id, $ip, $time);
            $this->zp->redirect($result["StartPay"]);
        } else {
            // error
            echo "خطا در ایجاد تراکنش";
            echo "<br />کد خطا : " . $result["Status"];
            echo "<br />تفسیر و علت خطا : " . $result["Message"];
        }
    }

    public function pay_verify()
    {
        $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
        $result = $this->zp->verify($this->MerchantID, $this->Amount, $this->SandBox, $this->ZarinGate);
        $status_paid = 'paid';
        $status_unsuccessful = 'unsuccessful';
        if (isset($result["Status"]) && $result["Status"] == 100) {
            // Success
            $this->model->update_payment($result["Status"], $status_paid, $result['ref_id'], $time, $result['Authority']);
            $this->model->update_factor($status_paid, $result['Authority']);
            $this->result = $result;
            $redirect = "verify/success-pay";

//            echo "تراکنش با موفقیت انجام شد";
//            echo "<br />مبلغ : " . $result["Amount"];
//            echo "<br />کد پیگیری : " . $result["RefID"];
//            echo "<br />Authority : " . $result["Authority"];
        } else {
            // error
            $this->model->update_payment($result["Status"], $status_unsuccessful, $result['ref_id'], $time, $result['Authority']);
            $this->model->update_factor($status_unsuccessful, $result['Authority']);
            $this->result = $result;
            $redirect = "verify/error-pay";

//            echo "پرداخت ناموفق";
//            echo "<br />کد خطا : " . $result["Status"];
//            echo "<br />تفسیر و علت خطا : " . $result["Message"];
        }
        Model::redirect($redirect);
    }

    public function verify($page)
    {
        $result = $this->result;
        switch ($page) {
            case "error-pay":
                $this->view('zarinpal/verfiy-error', compact('result'));
                break;
            case "success-pay":
                $this->view('zarinpal/verfiy-success', compact('result'));
                break;
        }
    }
}