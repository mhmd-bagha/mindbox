<?php

use Response\Response as response;

require DIR_ROOT . 'vendor/autoload.php';


class admin_comment extends \Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function end_comments()
    {
        return $this->model->end_comments();
    }

    public function comment_answer()
    {
        if (isset($_POST['btn_comment_answer'])) {
            $data = $_POST;
            $reply_id = $this->model->security($data['id']);
            $comment_text = $this->model->security($data['comment_answer']);
            $type = $this->model->security($data['type']);
            $course_id = $this->model->security($data['course_id']);
            $author = $this->model->security($data['author']);
            $comment_type = "admin";
            $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
            $ip = $_SERVER['REMOTE_ADDR'];
            $status_show = 'show';
            if (isset($reply_id, $comment_text, $type, $course_id, $author) && !empty($reply_id) && !empty($comment_text) && !empty($type) && !empty($course_id) && !empty($author)) {
                switch ($type) {
                    case "post":
                        $post = $this->model->answer($course_id, $comment_text, $reply_id, $comment_type, $author, $ip, $time, $status_show);
                        echo $post ? response::Json(200, true, [
                            'domain' => DOMAIN,
                            'message' => 'پاسخ نظر ثبت شد'
                        ]) : response::Json(500, true, [
                            'domain' => DOMAIN,
                            'message' => 'خطا در ثبت پاسخ'
                        ]);
                        break;
                    case "edit":
                        $edit = $this->model->edit($comment_text, $reply_id);
                        echo $edit ? response::Json(200, true, [
                            'domain' => DOMAIN,
                            'message' => 'پاسخ نظر ثبت شد'
                        ]) : response::Json(500, true, [
                            'domain' => DOMAIN,
                            'message' => 'خطا در ثبت پاسخ'
                        ]);
                        break;
                }
            } else {
                if (empty($reply_id) || empty($type) || empty($course_id) || empty($author))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'داده های ارسالی ناقص است'
                    ]);
                if (empty($comment_text))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد پاسخ را پر کنید'
                    ]);
            }
        }
    }
}