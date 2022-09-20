<?php
require dirname(__DIR__) . '/vendor/autoload.php';

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
        $courses_id = $this->model->decrypt($courses_id);
        $courses_id_implode = $courses_id;
        $courses_id = explode(',', $courses_id);
        foreach ($courses_id as $course_id) {
            $get_course = $this->model->where('courses', 'id', $course_id);
            if (!empty($get_course->course_discount)) {
                $balance_all += ($get_course->course_price - ($get_course->course_price * $get_course->course_discount / 100));
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
        $this->Amount = $balance_all;
        $this->Description = "تراکنش خرید دوره مایندباکس. مبلغ " . number_format($this->Amount) . " تومان";
        $this->Mobile = $user_phone;
        $this->Email = $user_email;
        $result = $this->zp->request($this->MerchantID, $this->Amount, $this->CallbackURL, $this->Description, $this->Email, $this->Mobile, $this->SandBox, $this->ZarinGate);
        if (isset($result["Status"]) && $result["Status"] == 100) {
            // Success and redirect to pay
            $_SESSION['amount'] = $this->Amount;
            $this->model->add_factor($user_id, $courses_id_implode, $factor_type, $this->Amount, $status, $result['Authority'], $ip, $time);
            $this->model->add_payment($this->Amount, $result["Authority"], $result["Status"], $status, $payment_number, $courses_id_implode, $user_id, $ip, $time);
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
        $email = new email();
        $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
        $this->Amount = $_SESSION['amount'];
        $result = $this->zp->verify($this->MerchantID, $this->Amount, $this->SandBox, $this->ZarinGate);
        $status_paid = 'paid';
        $status_unsuccessful = 'unsuccessful';
        $status_waiting = 'waiting';
        $get_user = $this->model->where('users', 'user_email', $this->model->decrypt(Model::SessionGet('user')));
        $user_id = $get_user->id;
        $full_name = $get_user->first_name . ' ' . $get_user->last_name;
        $user_email = $get_user->user_email;
        if (isset($result["Status"]) && $result["Status"] == 100) {
            // Success
            $this->model->update_payment($result["Status"], $status_paid, $result['RefID'], $time, $result['Authority']);
            $this->model->update_factor($status_paid, $result['Authority']);
            $this->model->update_cart($status_paid, $status_waiting, $user_id);
            $success_pay = helper::SuccessPay(DOMAIN, $result['RefID'], $this->Amount, 'مایندباکس', 'www.bebest20.ir', $time, EMAIL_USERNAME);
            $email->send($user_email, $full_name, 'رسید خرید اینترنتی مایندباکس', $success_pay);
            $redirect = "checkout/verify/success-pay";
        } else {
            // error
            $this->model->update_payment($result["Status"], $status_unsuccessful, null, $time, $result['Authority']);
            $this->model->update_factor($status_unsuccessful, $result['Authority']);
            $this->model->update_cart($status_unsuccessful, $status_waiting, $user_id);
            $error_pay = helper::ErrorPay(DOMAIN, $this->Amount, 'مایندباکس', 'www.bebest20.ir', $time, EMAIL_USERNAME, $result['Message']);
            $email->send($user_email, $full_name, 'رسید خرید اینترنتی مایندباکس', $error_pay);
            $redirect = "checkout/verify/error-pay";
        }
        $_SESSION['result'] = array('zarinpal' => $result, 'time' => $time, 'amount' => $this->Amount);
        Model::redirect($redirect);
    }

    public function verify($page)
    {
        $result = $_SESSION['result'];
        switch ($page) {
            case "error-pay":
                $this->view('zarinpal/verify-error', compact('result'));
                break;
            case "success-pay":
                $this->view('zarinpal/verfiy-success', compact('result'));
                break;
        }
        unset($_SESSION['amount']);
    }
}