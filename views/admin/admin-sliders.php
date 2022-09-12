
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
                    <h5>اسلایدر ها</h5>
                    <a data-bs-toggle="modal" data-bs-target="#form" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>ایجاد کردن</a>
                </div>
                <hr>
                <div class="row">
                    <!-- slider -->
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <!-- image slider -->
                            <a href="#"><img data-src="../public/images/s1.jpg" alt="" class="card-img-top lozad"></a>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="text-truncate mb-0">عنوان اسلایدر</h6>
                                    <span class="badge bg-success p-2">فعال</span>
                                </div>
                            </div>
                            <div class="card-footer bg-white text-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted">1401/05/03</span>
                                    <div class="btn-group">
                                        <a href="#" title="غیرفعال" class="btn btn-sm btn-outline-secondary shadow-none"><i class="fa-solid fa-toggle-off"></i></a>
                                        <a data-bs-toggle="modal" data-bs-target="#form" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                    <!-- modal edit & add -->
                                    <div class="modal fade" id="form" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">اسلایدر</h5>
                                                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <form action="" method="" class="border-form">
                                                        <div class="mb-3">
                                                            <label for="" class="mb-1">عنوان</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="" class="mb-1">آدرس</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="" class="mb-1">تصویر</label>
                                                            <input type="file" class="form-control">
                                                            <div class="progress mt-2">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%;">50%</div>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn-success">ثبت</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- slider -->
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <!-- image slider -->
                            <a href="#"><img data-src="../public/images/s2.jpg" alt="" class="card-img-top lozad"></a>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="text-truncate mb-0">عنوان اسلایدر</h6>
                                    <span class="badge bg-success p-2">فعال</span>
                                </div>
                            </div>
                            <div class="card-footer bg-white text-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted">1401/05/03</span>
                                    <div class="btn-group">
                                        <a href="#" title="غیرفعال" class="btn btn-sm btn-outline-secondary shadow-none"><i class="fa-solid fa-toggle-off"></i></a>
                                        <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- slider -->
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <!-- image slider -->
                            <a href="#"><img data-src="../public/images/s3.jpg" alt="" class="card-img-top lozad"></a>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="text-truncate mb-0">عنوان اسلایدر</h6>
                                    <span class="badge bg-success p-2">فعال</span>
                                </div>
                            </div>
                            <div class="card-footer bg-white text-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted">1401/05/03</span>
                                    <div class="btn-group">
                                        <a href="#" title="غیرفعال" class="btn btn-sm btn-outline-secondary shadow-none"><i class="fa-solid fa-toggle-off"></i></a>
                                        <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- slider -->
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <!-- image slider -->
                            <a href="#"><img data-src="../public/images/s4.jpg" alt="" class="card-img-top lozad"></a>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="text-truncate mb-0">عنوان اسلایدر</h6>
                                    <span class="badge bg-danger p-2">غیرفعال</span>
                                </div>
                            </div>
                            <div class="card-footer bg-white text-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted">1401/05/03</span>
                                    <div class="btn-group">
                                        <a href="#" title="فعال" class="btn btn-sm btn-outline-success shadow-none"><i class="fa-solid fa-toggle-on"></i></a>
                                        <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- slider -->
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <!-- image slider -->
                            <a href="#"><img data-src="../public/images/s5.jpg" alt="" class="card-img-top lozad"></a>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="text-truncate mb-0">عنوان اسلایدر</h6>
                                    <span class="badge bg-danger p-2">غیرفعال</span>
                                </div>
                            </div>
                            <div class="card-footer bg-white text-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted">1401/05/03</span>
                                    <div class="btn-group">
                                        <a href="#" title="فعال" class="btn btn-sm btn-outline-success shadow-none"><i class="fa-solid fa-toggle-on"></i></a>
                                        <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- slider -->
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <!-- image slider -->
                            <a href="#"><img data-src="../public/images/s6.jpg" alt="" class="card-img-top lozad"></a>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="text-truncate mb-0">عنوان اسلایدر</h6>
                                    <span class="badge bg-success p-2">فعال</span>
                                </div>
                            </div>
                            <div class="card-footer bg-white text-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted">1401/05/03</span>
                                    <div class="btn-group">
                                        <a href="#" title="غیرفعال" class="btn btn-sm btn-outline-secondary shadow-none"><i class="fa-solid fa-toggle-off"></i></a>
                                        <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>
    <!-- admin backdrop -->
    <div class="admin-backdrop"></div>
