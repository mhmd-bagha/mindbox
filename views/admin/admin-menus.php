
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
                    <h5>منو</h5>
                    <a data-bs-toggle="modal" data-bs-target="#form" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>ایجاد کردن</a>
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
                                    <th>نام منو</th>
                                    <th>آدرس منو</th>
                                    <th>وضعیت نمایش</th>
                                    <th>تاریخ ایجاد</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>صفحه اصلی</td>
                                    <td>mindbox/index</td>
                                    <td><span class="badge bg-success p-2">فعال</span></td>
                                    <td>1401/05/29</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="غیرفعال" class="btn btn-sm btn-outline-secondary shadow-none"><i class="fa-solid fa-toggle-off"></i></a>
                                            <a data-bs-toggle="modal" data-bs-target="#form" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>تماس با ما</td>
                                    <td>mindbox/contact-us</td>
                                    <td><span class="badge bg-danger p-2">غیرفعال</span></td>
                                    <td>1401/05/29</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="فعال" class="btn btn-sm btn-outline-success shadow-none"><i class="fa-solid fa-toggle-on"></i></a>
                                            <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>درباره ما</td>
                                    <td>mindbox/about-us</td>
                                    <td><span class="badge bg-success p-2">فعال</span></td>
                                    <td>1401/05/29</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="غیرفعال" class="btn btn-sm btn-outline-secondary shadow-none"><i class="fa-solid fa-toggle-off"></i></a>
                                            <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- modal edit & add -->
                <div class="modal fade" id="form" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">منو</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form action="" method="" class="border-form">
                                    <div class="mb-3">
                                        <label for="" class="mb-1">نام</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="mb-1">آدرس</label>
                                        <input type="text" class="form-control">
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
