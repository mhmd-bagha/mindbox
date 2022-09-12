
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
            <section class="main-content px-3 pt-1">
                <h5>کاربران</h5>
                <hr>
                <!-- card -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <!-- table -->
                        <table id="table" class="table table-borderless table-striped table-hover text-center">
                            <thead class="table-dark text-nowrap sticky-top">
                                <tr>
                                    <th>#</th>
                                    <th>نام و نام خانوادگی</th>
                                    <th>ایمیل</th>
                                    <th>شماره همراه</th>
                                    <th>وضعیت کاربر</th>
                                    <th>موجودی کیف پول (تومان)</th>
                                    <th>تاریخ ثبت نام</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>محمد ابراهیمی</td>
                                    <td>mohammad@gmail.com</td>
                                    <td>09151234567</td>
                                    <td><span class="badge bg-success p-2">فعال</span></td>
                                    <td>25,000</td>
                                    <td>1401/01/16</td>
                                    <td>
                                        <div class="btn-group">
                                            <a data-bs-toggle="modal" data-bs-target="#recharge-wallet" title="شارژ کیف پول" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-wallet"></i></a>
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>عارف مسعودی</td>
                                    <td>aref@gmail.com</td>
                                    <td>09391234567</td>
                                    <td><span class="badge bg-danger p-2">غیرفعال</span></td>
                                    <td>0</td>
                                    <td>1400/11/29</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="شارژ کیف پول" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-wallet"></i></a>
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>حسین اکرمی</td>
                                    <td>hossein@gmail.com</td>
                                    <td>09101234567</td>
                                    <td><span class="badge bg-success p-2">فعال</span></td>
                                    <td>450,000</td>
                                    <td>1400/06/20</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="شارژ کیف پول" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-wallet"></i></a>
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- modal recharge wallet -->
                <div class="modal fade" id="recharge-wallet" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">شارژ کیف پول</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form action="" method="" class="border-form">
                                    <div class="mb-3">
                                        <label for="" class="mb-1">مبلغ (تومان)</label>
                                        <input type="tel" class="form-control">
                                        <small>مبلغ موردنظر جایگزین موجودی کیف پول کاربر می شود.</small>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success">ثبت</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>
    <!-- admin backdrop -->
    <div class="admin-backdrop"></div>
