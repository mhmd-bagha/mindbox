
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
                <div class="d-flex justify-content-between align-items-center">
                    <h5>کیف پول</h5>
                    <a data-bs-toggle="modal" data-bs-target="#price-wallet" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>مبالغ پیشنهادی</a>
                    <!-- modal management price wallet -->
                    <div class="modal fade" id="price-wallet" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">مبالغ پیشنهادی</h5>
                                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- form -->
                                    <form action="" method="" class="border-form">
                                        <div class="row">
                                            <div class="col-12 col-sm-10 mb-3 mb-sm-0">
                                                <label for="" class="mb-1">مبلغ (تومان)</label>
                                                <input type="tel" class="form-control">
                                            </div>
                                            <div class="col-12 col-sm-2 d-grid align-self-end">
                                                <button type="submit" class="btn btn-success">ثبت</button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="table-responsive">
                                        <!-- table -->
                                        <table class="table table-borderless table-striped table-hover text-nowrap text-center">
                                            <thead class="table-dark sticky-top">
                                                <tr>
                                                    <th>#</th>
                                                    <th>مبلغ (تومان)</th>
                                                    <th>تاریخ</th>
                                                    <th>عملیات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>50,0000</td>
                                                    <td>1401/05/28</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>100,0000</td>
                                                    <td>1401/05/28</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>150,0000</td>
                                                    <td>1401/05/28</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>200,0000</td>
                                                    <td>1401/05/28</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- card -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <!-- table -->
                        <table id="table" class="table table-borderless table-striped table-hover text-center">
                            <thead class="table-dark text-nowrap sticky-top">
                                <tr>
                                    <th>#</th>
                                    <th>نام و نام خانوادگی کاربر</th>
                                    <th>ایمیل کاربر</th>
                                    <th>شماره همراه کاربر</th>
                                    <th>مبلغ شارژ (تومان)</th>
                                    <th>وضعیت پرداخت</th>
                                    <th>شماره پیگیری</th>
                                    <th>تاریخ تراکنش</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>محمد ابراهیمی</td>
                                    <td>mohammad@gmail.com</td>
                                    <td>09151234567</td>
                                    <td>25,000</td>
                                    <td><span class="badge bg-success p-2">پرداخت موفق</span></td>
                                    <td>475236</td>
                                    <td>1401/05/28</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>عارف مسعودی</td>
                                    <td>aref@gmail.com</td>
                                    <td>09391234567</td>
                                    <td>85,000</td>
                                    <td><span class="badge bg-success p-2">پرداخت موفق</span></td>
                                    <td>987625</td>
                                    <td>1401/05/28</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>حسین اکرمی</td>
                                    <td>hossein@gmail.com</td>
                                    <td>09101234567</td>
                                    <td>100,000</td>
                                    <td><span class="badge bg-danger p-2">پرداخت ناموفق</span></td>
                                    <td>875934</td>
                                    <td>1401/05/28</td>
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
