<?php
require DIR_ROOT . 'models/model_account.php';

class api extends Controller
{
    private $account;

    public function __construct()
    {
        parent::__construct();
        $this->account = new model_account();
    }

    public function exist_user_course($user_id, $course_id = '')
    {

        $my_courses_factors = $this->account->my_courses_factor($user_id);
        foreach ($my_courses_factors as $courses_factor) {
            $courses_factor = explode(',', $courses_factor->courses_id);
            for ($i = 0; $i < count($courses_factor); $i++) {
                $my_courses[] = $this->model->my_course($courses_factor[$i]);
            }
        }
        print_r($my_courses_factors);
//        die();
//        $exist_user_course = $this->model->exist_user_course($user_id, $course_id);
//        return $exist_user_course;
    }
}
