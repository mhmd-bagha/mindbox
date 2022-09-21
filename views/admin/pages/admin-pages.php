
    <div class="container-fluid">
        <!-- sidebar -->
        <?php
        require_once(DIR_ROOT . "views/admin/admin-menu.php");
        ?>
        <!-- content wrapper -->
        <section class="content-wrapper">
            <!-- header content -->
            <?php
            require_once(DIR_ROOT . "views/admin/admin-header.php");
            ?>
            <!-- main content -->
            <section class="main-content px-3">
                <h5>صفحات</h5>
                <hr>
                <!-- card -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <ul class="nav nav-pills text-nowrap nav-custom mb-3">
                            <li class="nav-item">
                                <button class="nav-link fw-bold active" data-bs-toggle="pill" data-bs-target="#tab-pages" type="button">صفحات</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fw-bold" data-bs-toggle="pill" data-bs-target="#tab-mindbox" type="button">مایندباکس</button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- content -->
                            <div class="tab-pane fade show active" id="tab-pages">
                                <ul class="nav nav-pills text-nowrap nav-custom mb-3">
                                    <li class="nav-item">
                                        <button class="nav-link fw-bold active" data-bs-toggle="pill" data-bs-target="#tab-rules" type="button">قوانین</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link fw-bold" data-bs-toggle="pill" data-bs-target="#tab-about-us" type="button">درباره ما</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link fw-bold" data-bs-toggle="pill" data-bs-target="#tab-contact-us" type="button">تماس با ما</button>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <!-- content -->
                                    <div class="tab-pane fade show active" id="tab-rules">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5>قوانین</h5>
                                            <a data-bs-toggle="modal" data-bs-target="#form" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>ایجاد کردن</a>
                                        </div>
                                        <!-- table -->
                                        <table id="table" class="table table-borderless table-striped table-hover text-center">
                                            <thead class="table-dark text-nowrap sticky-top">
                                                <tr>
                                                    <th>#</th>
                                                    <th>عنوان قوانین</th>
                                                    <th>وضعیت نمایش</th>
                                                    <th>تاریخ ایجاد</th>
                                                    <th>عملیات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>قوانین حساب کاربری</td>
                                                    <td><span class="badge bg-success p-2">قعال</span></td>
                                                    <td>1401/06/12</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a data-bs-toggle="modal" data-bs-target="#show-more" title="نمایش بیشتر" class="btn btn-sm btn-outline-info shadow-none"><i class="fa-solid fa-eye"></i></a>
                                                            <a href="#" title="غیرفعال" class="btn btn-sm btn-outline-secondary shadow-none"><i class="fa-solid fa-toggle-off"></i></a>
                                                            <a data-bs-toggle="modal" data-bs-target="#form" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>حریم شخصی کاربران</td>
                                                    <td><span class="badge bg-danger p-2">غیرفعال</span></td>
                                                    <td>1401/06/12</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="#" title="نمایش بیشتر" class="btn btn-sm btn-outline-info shadow-none"><i class="fa-solid fa-eye"></i></a>
                                                            <a href="#" title="فعال" class="btn btn-sm btn-outline-success shadow-none"><i class="fa-solid fa-toggle-on"></i></a>
                                                            <a href="#" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>شرایط ثبت نقد و نظرات کاربران در وب‌سایت</td>
                                                    <td><span class="badge bg-success p-2">قعال</span></td>
                                                    <td>1401/06/12</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="#" title="نمایش بیشتر" class="btn btn-sm btn-outline-info shadow-none"><i class="fa-solid fa-eye"></i></a>
                                                            <a href="#" title="غیرفعال" class="btn btn-sm btn-outline-secondary shadow-none"><i class="fa-solid fa-toggle-off"></i></a>
                                                            <a href="#" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- modal show more -->
                                        <div class="modal fade" id="show-more" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">قوانین حساب کاربری</h5>
                                                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card my-3">
                                                            <div class="card-body text-wrap text-justify">
                                                                <h6 class="fw-bold"><i class="fa-solid fa-receipt text-muted me-2"></i>توضیحات</h6>
                                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal edit & add -->
                                        <div class="modal fade" id="form" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">دوره</h5>
                                                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body text-start">
                                                        <form action="" method="" class="border-form">
                                                            <div class="mb-3">
                                                                <label for="" class="mb-1">عنوان</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="" class="mb-1">توضیحات</label>
                                                                <textarea class="form-control" id="text-rule"></textarea>
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
                                    <!-- content -->
                                    <div class="tab-pane fade" id="tab-about-us">
                                        <!-- form -->
                                        <form action="" method="" class="border-form">
                                            <div class="col-12 col-md-6 col-xl-4 mb-3">
                                                <label for="" class="mb-1">عنوان</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="mb-1">متن</label>
                                                <textarea class="form-control" id="text-about-us"></textarea>
                                            </div>
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-success">ثبت</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- content -->
                                    <div class="tab-pane fade" id="tab-contact-us">
                                        <!-- form -->
                                        <form action="" method="" class="border-form">
                                            <div class="mb-3">
                                                <label for="" class="mb-1">آدرس</label>
                                                <textarea rows="2" class="form-control"></textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label for="" class="mb-1">شماره تلفن</label>
                                                    <input type="tel" class="form-control">
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label for="" class="mb-1">ایمیل</label>
                                                    <input type="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-success">ثبت</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- content -->
                            <div class="tab-pane fade" id="tab-mindbox">
                                <ul class="nav nav-pills text-nowrap nav-custom mb-3">
                                    <li class="nav-item">
                                        <button class="nav-link fw-bold active" data-bs-toggle="pill" data-bs-target="#tab-benefits" type="button">مزایا</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link fw-bold" data-bs-toggle="pill" data-bs-target="#tab-history-one" type="button">داستان اول</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link fw-bold" data-bs-toggle="pill" data-bs-target="#tab-history-two" type="button">داستان دوم</button>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <!-- content -->
                                    <div class="tab-pane fade show active" id="tab-benefits">
                                        <!-- form -->
                                        <form action="" method="" class="border-form">
                                            <div class="row">
                                                <div class="col-12 col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="" class="mb-1">عنوان 1</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="mb-1">متن 1</label>
                                                        <textarea rows="2" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="" class="mb-1">عنوان 2</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="mb-1">متن 2</label>
                                                        <textarea rows="2" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="" class="mb-1">عنوان 3</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="mb-1">متن 3</label>
                                                        <textarea rows="2" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="" class="mb-1">عنوان 4</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="mb-1">متن 4</label>
                                                        <textarea rows="2" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-success">ثبت</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- content -->
                                    <div class="tab-pane fade" id="tab-history-one">
                                        <!-- form -->
                                        <form action="" method="" class="border-form">
                                            <div class="col-12 col-md-6 col-xl-4 mb-3">
                                                <label for="" class="mb-1">عنوان</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="mb-1">متن</label>
                                                <textarea class="form-control" id="text-history-one"></textarea>
                                            </div>
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-success">ثبت</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- content -->
                                    <div class="tab-pane fade" id="tab-history-two">
                                        <!-- form -->
                                        <form action="" method="" class="border-form">
                                            <div class="col-12 col-md-6 col-xl-4 mb-3">
                                                <label for="" class="mb-1">عنوان</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="mb-1">متن</label>
                                                <textarea class="form-control" id="text-history-two"></textarea>
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
            </section>
        </section>
    </div>
    <!-- admin backdrop -->
    <div class="admin-backdrop"></div>
  
    <!-- script -->
    <script>
        // ckeditor text rule
        CKEDITOR.replace('text-rule', {
            language: 'fa'
        });
        // ckeditor text about us
        CKEDITOR.replace('text-about-us', {
            language: 'fa'
        });
        // ckeditor text about us
        CKEDITOR.replace('text-history-one', {
            language: 'fa'
        });
        // ckeditor text about us
        CKEDITOR.replace('text-history-two', {
            language: 'fa'
        });
    </script>
