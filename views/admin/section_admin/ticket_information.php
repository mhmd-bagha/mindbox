<?php $get_ticket = $data['get_ticket'];
$get_user = $this->model->where('users', 'id', $get_ticket->user_id); ?>
<div class="card-header bg-white p-4">
    <div class="d-sm-flex justify-content-sm-between">
        <p class="m-0 text-truncate"><?= $get_user->first_name . ' ' . $get_user->last_name ?></p>
        <p class="m-0 text-truncate"><?= $get_ticket->ticket_title ?></p>
        <p class="m-0 text-truncate"><?= $get_user->user_email ?></p>
        <p class="m-0 text-truncate">وضعیت: <?php switch ($get_ticket->ticket_status) {
                case "waiting":
                    ?> <span
                    class="badge bg-warning p-2"> در انتظار پاسخ</span> <?php break;
                case "closed":
                    ?> <span
                    class="badge bg-danger p-2">بسته شده</span> <?php break;
                case "answered":
                    ?> <span
                    class="badge bg-success p-2">پاسخ داده شده</span> <?php break;
            } ?></p>
    </div>
</div>