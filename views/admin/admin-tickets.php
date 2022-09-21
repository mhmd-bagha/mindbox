<div class="container-fluid">
    <!-- sidebar -->
    <?php
    require_once("admin-menu.php");
    ?>
    <!-- content wrapper -->
    <section class="content-wrapper">
        <!-- header content -->
        <?php
        require_once("admin-header.php");
        ?>
        <!-- main content -->
        <section class="main-content px-3">
            <h5>تیکت ها</h5>
            <hr>
            <!-- card -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <!-- table -->
                    <table id="table" class="table table-borderless table-striped table-hover text-nowrap text-center">
                        <thead class="table-dark text-nowrap sticky-top">
                        <tr>
                            <th>شماره تیکت</th>
                            <th>عنوان تیکت</th>
                            <th>نام و نام خانوادگی کاربر</th>
                            <th>ایمیل کاربر</th>
                            <th>شماره همراه کاربر</th>
                            <th>وضعیت</th>
                            <th>تاریخ ثبت</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data['ticket_all'] as $ticket) {
                            $get_user_ticket = $this->model->where('users', 'id', $ticket->user_id); ?>
                            <tr>
                                <td><?= $ticket->id ?></td>
                                <td>
                                    <a href="<?= DOMAIN ?>/admin/ticket/<?= $ticket->id ?>"><?= $ticket->ticket_title ?></a>
                                </td>
                                <td><?= $get_user_ticket->first_name . ' ' . $get_user_ticket->last_name ?></td>
                                <td><?= $get_user_ticket->user_email ?></td>
                                <td><?= $get_user_ticket->phone_mobile ?></td>
                                <td><?php switch ($ticket->ticket_status) {
                                        case "waiting":
                                            ?> <span
                                                class="badge bg-warning p-2"> در انتظار پاسخ</span> <?php break;
                                        case "closed":
                                            ?> <span
                                                class="badge bg-danger p-2">بسته شده</span> <?php break;
                                        case "answered":
                                            ?> <span
                                                class="badge bg-success p-2">پاسخ داده شده</span> <?php break;
                                    } ?></td>
                                <td><?= $ticket->create_time ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>
</div>
<!-- admin backdrop -->
<div class="admin-backdrop"></div>
