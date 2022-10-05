<?php
require DIR_ROOT . '/vendor/autoload.php';

use Response\Response as response;

class admin_discounts extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_discount()
    {
        return $this->model->get_discount();
    }

    public function add()
    {
        if (isset($_POST['btn_discount'])) {
            $data = $_POST;
            $discount = $this->model->security($data['discount']);
            $courses_id = $data['courses'];
            $time_start = $this->model->security($data['time_start']);
            $time_start = $this->model->number_en($time_start);
            $time_end = $this->model->security($data['time_end']);
            $time_end = $this->model->number_en($time_end);
            $author = $this->model->security($data['$author']);
            $status_show = 'show';
            $time = Model::time_jalili_en();
            $ip = $_SERVER['REMOTE_ADDR'];
            if (isset($discount, $courses_id, $time_start, $time_end, $author) && !empty($discount) && !empty($courses_id) && !empty($time_start) && !empty($time_end) && !empty($author)) {
                $add = $this->model->add($courses_id, $discount, $time_start, $time_end, $author, $ip, $status_show, $time);
                echo ($add) ? response::Json(200, true, [
                    'domain' => DOMAIN,
                    'message' => 'تخفیفات با موفقیت اضافه شد'
                ]) : response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'خطا در اضافه کردن تخفیفات'
                ]);
            } else {
                if (empty($discount))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد درصد تخفیف اجباری است'
                    ]);
                if (empty($courses_id))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد دوره ها اجباری است'
                    ]);
                if (empty($time_start))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد تاریخ شروع اجباری است'
                    ]);
                if (empty($time_end))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد تازیخ اتمام اجباری است'
                    ]);
                if (empty($author))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => errors['empty_data']
                    ]);
            }
        }
    }
}