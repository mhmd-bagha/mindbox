
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
                                    <a href="user-add-ticket.php" class="btn-blue">تیکت جدید</a>
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
                                            <tr>
                                                <td><span class="badge bg-warning p-2">در انتظار پاسخ</span></td>
                                                <td><a href="<?php echo DOMAIN ?>/account/user_ticket" class="text-dark">پرداخت ناموفق</a></td>
                                                <td>1401/05/29</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge bg-danger p-2">بسته شده</span></td>
                                                <td><a href="#" class="text-dark">مشکل در پرداخت</a></td>
                                                <td>1401/04/16</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge bg-success p-2">پاسخ داده شده</span></td>
                                                <td><a href="#" class="text-dark">مشکل در دوره</a></td>
                                                <td>1401/03/19</td>
                                            </tr>
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
