
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
                                    <th>#</th>
                                    <th>شماره تیکت</th>
                                    <th>عنوان تیکت</th>
                                    <th>نام و نام خانوادگی کاربر</th>
                                    <th>ایمیل کاربر</th>
                                    <th>شماره همراه کاربر</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ ثبت</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>7859632</td>
                                    <td><a href="<?= DOMAIN ?>/admin/admin_ticket">تیکت اول</a></td>
                                    <td>محمد ابراهیمی</td>
                                    <td>mohammad@gmail.com </td>
                                    <td>09391234567</td>
                                    <td><span class="badge bg-warning p-2">در انتظار پاسخ</span></td>
                                    <td>1401/03/02</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2569873</td>
                                    <td><a href="#">تیکت دوم</a></td>
                                    <td>عارف مسعودی</td>
                                    <td>aref@gmail.com </td>
                                    <td>09151234567</td>
                                    <td><span class="badge bg-danger p-2">بسته شده</span></td>
                                    <td>1401/02/19</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>9574638</td>
                                    <td><a href="#">تیکت سوم</a></td>
                                    <td>حسین اکرمی</td>
                                    <td>hosein@gmail.com </td>
                                    <td>09101234567</td>
                                    <td><span class="badge bg-success p-2">پاسخ داده شده</span></td>
                                    <td>1401/01/15</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </section>
    </div>
    <!-- admin backdrop -->
    <div class="admin-backdrop"></div>
