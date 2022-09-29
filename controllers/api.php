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
        return in_array($course_id, $courses_id);
//        echo (in_array($course_id, $courses_id)) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'true']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'false']);
    }

    public function download_file_course($url, $file_name)
    {
        $download_file = file_put_contents('' . $file_name, file_get_contents($url));
        return (bool)$download_file;
    }
}
