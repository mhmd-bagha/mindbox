<?php
require DIR_ROOT . 'models/model_account.php';

use Response\Response as response;

class api extends Controller
{
    private $account;

    public function __construct()
    {
        parent::__construct();
        $this->account = new model_account();
    }

    public function exist_user_course(int $user_id, int $course_id)
    {
        $my_courses_factors = $this->account->my_courses_factor($user_id);
        foreach ($my_courses_factors as $courses_factor) {
            $courses_factor = explode(',', $courses_factor->courses_id);
            for ($i = 0; $i < count($courses_factor); $i++) {
                $my_courses[] = $this->account->my_course($courses_factor[$i]);
            }
        }
        foreach ($my_courses as $my_course) {
            $my_course = $my_course[0];
            $courses_id[] = $my_course->id;
        }
        $exist_course_user = in_array($course_id, $courses_id);
        return $exist_course_user ? $exist_course_user : false;
    }

    public function download_file_course($url, $file_name)
    {
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: utf-8");
        header("Content-disposition: attachment; filename=\"" . basename($url) . "\"");
        readfile($url, true);
        flush();
        $download_file = readfile($url, true);
        return (bool)$download_file;
    }

    public function discounts($type_discount)
    {
        $current_time = jdate('Y/m/d', time(), '', 'Asia/Tehran', 'en');
        $discounts_all = $this->model->where_all('discounts', 'status_show', 'show');
        foreach ($discounts_all as $discount_all) {
            $course_id = $discount_all->course_id;
            $discount = $discount_all->discount;
            $time_start = $discount_all->time_start;
            $time_end = $discount_all->time_end;
            if ($type_discount == 'start') {
                if ($time_start == $current_time)
                    $courses_id[] = [$course_id => $discount];
            } elseif ($type_discount == 'end') {
                if ($time_end == $current_time)
                    $courses_id[] = $course_id;
            }
        }
        if (!empty($courses_id)) {
            $discounts = $this->model->discounts($courses_id, $type_discount);
            return (bool)$discounts;
        }
    }
}
