<?php

require DIR_ROOT . 'vendor/autoload.php';
require DIR_ROOT . 'vendor/api-file-uploader/api-file-uploader/uploader/Uploader.php';

use Uploader\Uploader as file_uploader;
use Response\Response as response;

class admin_ticket extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function ticket_answer()
    {
        if (isset($_POST['btn_answer_ticket'])) {
            $data = $_POST;
            $file_uploader = new file_uploader();
            $ticket_description = $this->model->security($data['ticket_description']);
            $admin_id = $this->model->security($data['admin_id']);
            $ticket_id = $this->model->security($data['ticket_id']);
            $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
            $ip = $_SERVER['REMOTE_ADDR'];
            $ticket_type = 'admin';
            $ticket_status = 'answered';
            if (isset($ticket_description, $admin_id, $ticket_id) && !empty($ticket_description) && !empty($admin_id) && !empty($ticket_id)) {
                if (isset($_FILES['ticket_image']['name']) && !empty($_FILES['ticket_image']['name'])) {
                    $data_file = $_FILES['ticket_image'];
                    $ticket_img_name = $data_file['name'];;
                    $ticket_img_tmp = $data_file['tmp_name'];
                    $ticket_img_size = $data_file['size'];
                    $ticket_img_type = $data_file['type'];
                    $ticket_image = $this->model->add_name_file_time($ticket_img_name, 'image');
                    if (in_array($ticket_img_type, TYPE_IMG)) {
                        if ($ticket_img_size <= SIZE_IMG) {
                            $add_ticket = $this->model->ticket_answer($ticket_description, $ticket_image, $ticket_status, $ticket_type, $ticket_id, $admin_id, $ip, $time);
                            if ($add_ticket) {
                                $file_uploader->uploader($ticket_img_tmp, $ticket_img_type, $ticket_image, 'image_ticket', DL_DOMAIN . '/uploader/getter.php');
                                $this->model->ticket_status($ticket_id, $ticket_status);
                                echo response::Json(200, true, [
                                    'domain' => DOMAIN,
                                    'message' => 'پاسخ تیکت با موفقیت ثبت شد',
                                    'redirect' => DOMAIN . "/admin/ticket/{$ticket_id}"
                                ]);
                            } else
                                echo response::Json(500, true, [
                                    'domain' => DOMAIN,
                                    'message' => 'خطا در ثبت پاسخ'
                                ]);
                        } else
                            echo response::Json(500, true, [
                                'domain' => DOMAIN,
                                'message' => 'حجم تصویر باید زیر ۲ مگابایت باشد'
                            ]);
                    } else
                        echo response::Json(500, true, [
                            'domain' => DOMAIN,
                            'message' => 'پسوند های مجاز است png یا jpg یا jpeg'
                        ]);
                } else {
                    $add_ticket = $this->model->ticket_answer($ticket_description, null, $ticket_status, $ticket_type, $ticket_id, $admin_id, $ip, $time);
                    if ($add_ticket) {
                        $this->model->ticket_status($ticket_id, $ticket_status);
                        echo response::Json(200, true, [
                            'domain' => DOMAIN,
                            'message' => 'پاسخ تیکت با موفقیت ثبت شد',
                            'redirect' => DOMAIN . "/admin/ticket/{$ticket_id}"
                        ]);
                    } else
                        echo response::Json(500, true, [
                            'domain' => DOMAIN,
                            'message' => 'خطا در ثبت پاسخ'
                        ]);
                }
            } else {
                if (empty($ticket_description))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد متن تیکت اجباری است'
                    ]);
                if (empty($admin_id) || empty($ticket_id))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'اطلاعات ارسالی ناقص است'
                    ]);
            }
        }
    }
}
