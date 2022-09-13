<?php

use Response\Response as response;

class cart extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!Model::SessionGet('user')) Model::redirect('/login');
        $this->scripts_path = ['vendor/lozad/lozad.min.js', 'js/app.js'];
    }

    public function index()
    {
        $balance_all = 0;
        $balance_all_discount = 0;
        $this->title = 'سبد خرید';
        $data_user = $this->model->where('users', 'user_email', $this->model->decrypt(Model::SessionGet('user')));
        $data_cart = $this->model->cart($data_user->id);
        if ($data_cart) {
            $courses_id = $data_cart->courses_id;
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
        }
        $this->view('cart/index', compact('data_cart', 'data_user', 'balance_all', 'balance_all_discount'));
    }

    public function add($type)
    {
        switch ($type) {
            case "money":
                if (isset($_POST['add_cart'])) {
                    $data = $_POST;
                    $course_id = $this->model->security($data['course_id']);
                    $user_id = $this->model->where('users', 'user_email', $this->model->decrypt(Model::SessionGet('user')))->id;
                    $status = 'waiting';
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $time = jdate("Y/m/d H:i:s", time(), '', 'Asia/Tehran', 'en');
                    $find_cart = $this->model->find('status', $status);
                    if ($find_cart) {
                        $courses_id = $find_cart->courses_id;
                        $courses_id = explode(',', $courses_id);
                        if (!in_array($course_id, $courses_id)) {
                            $courses_id_push = array_push($courses_id, $course_id);
                            $courses_id = implode(',', $courses_id);
                            $update_cart = $this->model->update($courses_id, $user_id, $status, $time);
                            if ($update_cart)
                                echo response::Json(200, true, [
                                    'domain' => DOMAIN,
                                    'message' => 'دوره با موفقیت به سبد خرید اضافه شد'
                                ]);
                            else
                                echo response::Json(500, true, [
                                    'domain' => DOMAIN,
                                    'message' => 'خطا در اضافه کردن دوره به سبد خرید'
                                ]);
                        } else {
                            echo response::Json(500, true, [
                                'domain' => DOMAIN,
                                'message' => 'این دوره در سبد خرید شما موجود است'
                            ]);
                        }
                    } else {
                        $add_cart = $this->model->add($course_id, $user_id, $status, $ip, $time);
                        if ($add_cart)
                            echo response::Json(200, true, [
                                'domain' => DOMAIN,
                                'message' => 'دوره با موفقیت به سبد خرید اضافه شد'
                            ]);
                        else
                            echo response::Json(500, true, [
                                'domain' => DOMAIN,
                                'message' => 'خطا در اضافه کردن دوره به سبد خرید'
                            ]);
                    }
                }
                break;
            case "free":
                if (isset($_POST['add_cart'])) {
                    $data = $_POST;
                    $user_id = $this->model->where('users', 'user_email', $this->model->decrypt(Model::SessionGet('user')))->id;
                    $course_id = $this->model->security($data['course_id']);
                    $factor_type = 'free';
                    $status = 'paid';
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $time = jdate("Y/m/d H:i:s", time(), '', 'Asia/Tehran', 'en');
                    $factor_number = $this->model->buildNum('factors', 'factor_number', mt_rand(10000, 999999));
                    $factors = $this->model->add_factors($user_id, $course_id, $factor_type, $status, $factor_number, $ip, $time);
                    if ($factors)
                        echo response::Json(200, true, [
                            'domain' => DOMAIN,
                            'message' => 'دوره با موفقیت ثبت شد'
                        ]);
                    else
                        echo response::Json(500, true, [
                            'domain' => DOMAIN,
                            'message' => 'خطا در اضافه کردن دوره'
                        ]);
                }
                break;
        }
    }

    public function delete()
    {
        if (isset($_POST['delete_cart'])) {
            $data = $_POST;
            $course_id = $this->model->security($data['course_id']);
            $user_id = $this->model->where('users', 'user_email', $this->model->decrypt(Model::SessionGet('user')))->id;
            $status = 'waiting';
            $time = jdate("Y/m/d H:i:s", time(), '', 'Asia/Tehran', 'en');
            $courses_id = $this->model->find('status', $status)->courses_id;
            $courses_id = explode(',', $courses_id);
            if (in_array($course_id, $courses_id)) {
                foreach ($courses_id as $key => $value) {
                    if ($value == $course_id)
                        unset($courses_id[$key]);
                }
                if (!empty($courses_id)) {
                    $courses_id = implode(',', $courses_id);
                    $update_cart = $this->model->update($courses_id, $user_id, $status, $time);
                } else {
                    $get_cart = $this->model->find('status', 'waiting');
                    $update_cart = $this->model->delete($get_cart->id);
                }
                if ($update_cart)
                    echo response::Json(200, true, [
                        'domain' => DOMAIN,
                        'message' => 'دوره با موفقیت از سبد خرید حذف شد'
                    ]);
                else
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'خطا در حذف دوره از سبد خرید'
                    ]);
            } else {
                echo response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'خطا در حذف دوره از سبد خرید'
                ]);
            }
        }
    }
}