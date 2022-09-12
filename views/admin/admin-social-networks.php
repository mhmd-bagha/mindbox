
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
                <div class="d-flex justify-content-between align-items-center">
                    <h5>شبکه های اجتماعی</h5>
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
                                    <th>نام</th>
                                    <th>آدرس</th>
                                    <th>آیکن</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>تلگرام</td>
                                    <td>https://t.me/mindbox</td>
                                    <td>fab fa-telegram</td>
                                    <td>
                                        <div class="btn-group">
                                            <a data-bs-toggle="modal" data-bs-target="#form" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>آپارات</td>
                                    <td>https://www.aparat.com/mindbox</td>
                                    <td>fab fa-telegram</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>اینستاگرام</td>
                                    <td>https://www.instagram.com//mindbox</td>
                                    <td>fab fa-telegram</td>
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
                <!-- modal edit & add -->
                <div class="modal fade" id="form" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">شبکه اجتماعی</h5>
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
                                    <div class="mb-3">
                                        <label for="" class="mb-1">آیکن</label>
                                        <select class="form-control">
                                            <option disabled selected>انتخاب کنید...</option>
                                            <option value="fa-brands fa-instagram">اینستاگرام</option>
                                            <option value="fa-brands fa-youtube">یوتوب</option>
                                            <option value="fa-solid fa-compact-disc">آپارات</option>
                                            <option value="fa-solid fa-paper-plane">تلگرام</option>
                                            <option value="fa-regular fa-paper-plane">تلگرام 2</option>
                                            <option value="fa-brands fa-facebook">فیسبوک</option>
                                            <option value="fa-brands fa-square-facebook">فیسبوک 2</option>
                                            <option value="fa-brands fa-twitter">توییتر</option>
                                            <option value="fa-brands fa-square-twitter">توییتر 2</option>
                                            <option value="fa-solid fa-envelope">ایمیل</option>
                                            <option value="fa-regular fa-envelope">ایمیل 2</option>
                                        </select>
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
