
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
                    <h5>فایل ها</h5>
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
                                    <th>فایل دوره</th>
                                    <th>عنوان فایل</th>
                                    <th>مدت زمان فایل</th>
                                    <th>نوع فایل</th>
                                    <th>ترتیب شماره</th>
                                    <th>نام دوره</th>
                                    <th>وضعیت نمایش</th>
                                    <th>تاریخ ایجاد</th>
                                    <th>تاریخ بروزرسانی</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="#">دانلود</a></td>
                                    <td>قسمت اول</td>
                                    <td>00:23:14</td>
                                    <td>رایگان</td>
                                    <td>1</td>
                                    <td>عادت های اتمی</td>
                                    <td><span class="badge bg-success p-2">قعال</span></td>
                                    <td>1401/01/02</td>
                                    <td>1401/06/12</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="غیرفعال" class="btn btn-sm btn-outline-secondary shadow-none"><i class="fa-solid fa-toggle-off"></i></a>
                                            <a data-bs-toggle="modal" data-bs-target="#form" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><a href="#">دانلود</a></td>
                                    <td>قسمت دوم</td>
                                    <td>00:13:45</td>
                                    <td>نقدی</td>
                                    <td>2</td>
                                    <td>عادت های اتمی</td>
                                    <td><span class="badge bg-success p-2">قعال</span></td>
                                    <td>1400/05/22</td>
                                    <td>1400/09/19</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="غیرفعال" class="btn btn-sm btn-outline-secondary shadow-none"><i class="fa-solid fa-toggle-off"></i></a>
                                            <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><a href="#">دانلود</a></td>
                                    <td>قسمت دوم</td>
                                    <td>00:13:45</td>
                                    <td>نقدی</td>
                                    <td>2</td>
                                    <td>عادت های اتمی</td>
                                    <td><span class="badge bg-danger p-2">غیرفعال</span></td>
                                    <td>1400/05/14</td>
                                    <td>1400/05/22</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="فعال" class="btn btn-sm btn-outline-success shadow-none"><i class="fa-solid fa-toggle-on"></i></a>
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
                                <h5 class="modal-title">فایل</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form action="" method="" class="border-form">

                                    <div class="mb-3">
                                        <label for="" class="mb-1">فایل دوره</label>
                                        <input type="file" class="form-control">
                                        <div class="progress mt-2">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%;">50%</div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="mb-1">عنوان دوره</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="mb-1">مدت زمان</label>
                                        <input type="tel" class="form-control">
                                        <small>فرمت مدت زمان باید به این شکل (00:00:00) باشد.</small>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-3">
                                            <label for="" class="mb-1">ترتیب شماره</label>
                                            <input type="tel" class="form-control">
                                        </div>
                                        <div class="col-12 col-sm-6 mb-3">
                                            <label for="" class="mb-1">نوع فایل</label>
                                            <select class="form-control">
                                                <option disabled selected>انتخاب کنید...</option>
                                                <option>نقدی</option>
                                                <option>رایگان</option>
                                            </select>
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
            </section>
        </section>
    </div>
    <!-- admin backdrop -->
    <div class="admin-backdrop"></div>
