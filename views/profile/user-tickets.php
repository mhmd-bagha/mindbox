<!-- main -->
<main>
    <div class="container-fluid py-5">
        <div class="container">
            <div class="card border-0 rounded-0 box-shadow-sm">
                <div class="card-body p-0">
                    <div class="row mx-0">
                        <div class="col-12 col-lg-3 user-menu">
                            <!-- user menu -->
                            <?php
                            require_once("user-menu.php");
                            ?>
                        </div>
                        <div class="col-12 col-lg-9 user-content">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>تیکت ها</h5>
                                <a href="<?= DOMAIN ?>/account/add_ticket" class="btn-blue">تیکت جدید</a>
                            </div>
                            <hr>
                            <div class="table-responsive overflow-y-auto">
                                <!-- table -->
                                <table class="table table-striped table-hover table-bordered text-center text-nowrap">
                                    <thead class="table-dark sticky-top">
                                    <tr>
                                        <th>وضعیت</th>
                                        <th>عنوان</th>
                                        <th>تاریخ ثبت</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($data['tickets_all'] as $ticket) { ?>
                                        <tr>
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
                                            <td>
                                                <a href="<?php echo DOMAIN ?>/account/ticket/<?= $ticket->id ?>"><?= $ticket->ticket_title ?></a>
                                            </td>
                                            <td><?= $ticket->create_time ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
