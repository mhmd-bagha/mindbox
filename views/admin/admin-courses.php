
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
                    <h5>دوره ها</h5>
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
                                    <th>ویدیو دوره</th>
                                    <th>نام دوره</th>
                                    <th>مدرس دوره</th>
                                    <th>نوع دوره</th>
                                    <th>تعداد جلسات</th>
                                    <th>قیمت دوره (تومان)</th>
                                    <th>درصد تخفیف</th>
                                    <th>سطح دوره</th>
                                    <th>وضعیت دوره</th>
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
                                    <td>عادت های اتمی</td>
                                    <td>جیمز کلیر</td>
                                    <td>نقدی</td>
                                    <td>10</td>
                                    <td>150,000</td>
                                    <td>0</td>
                                    <td>پیشرفته</td>
                                    <td>در حال برگذاری</td>
                                    <td><span class="badge bg-success p-2">قعال</span></td>
                                    <td>1401/01/02</td>
                                    <td>1401/06/12</td>
                                    <td>
                                        <div class="btn-group">
                                            <a data-bs-toggle="modal" data-bs-target="#show-more" title="نمایش بیشتر" class="btn btn-sm btn-outline-info shadow-none"><i class="fa-solid fa-eye"></i></a>
                                            <a href="#" title="غیرفعال" class="btn btn-sm btn-outline-secondary shadow-none"><i class="fa-solid fa-toggle-off"></i></a>
                                            <a href="<?= DOMAIN ?>/admin/admin_course_part" title="فایل ها" class="btn btn-sm btn-outline-dark shadow-none"><i class="fa-solid fa-list-check"></i></a>
                                            <a data-bs-toggle="modal" data-bs-target="#form" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="#">دانلود</a></td>
                                    <td>دیسپنزا</td>
                                    <td>جو دیسپنزا</td>
                                    <td>رایگان</td>
                                    <td>10</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>متوسط</td>
                                    <td>به اتمام رسیده</td>
                                    <td><span class="badge bg-danger p-2">غیرفعال</span></td>
                                    <td>1400/05/22</td>
                                    <td>1400/09/19</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="نمایش بیشتر" class="btn btn-sm btn-outline-info shadow-none"><i class="fa-solid fa-eye"></i></a>
                                            <a href="#" title="فعال" class="btn btn-sm btn-outline-success shadow-none"><i class="fa-solid fa-toggle-on"></i></a>
                                            <a href="#" title="فایل ها" class="btn btn-sm btn-outline-dark shadow-none"><i class="fa-solid fa-list-check"></i></a>
                                            <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><a href="#">دانلود</a></td>
                                    <td>سحرخیزی پلاس</td>
                                    <td>رابین شارما</td>
                                    <td>نقدی</td>
                                    <td>10</td>
                                    <td>320,000</td>
                                    <td>40٪</td>
                                    <td>مقدماتی</td>
                                    <td>به اتمام رسیده</td>
                                    <td><span class="badge bg-success p-2">قعال</span></td>
                                    <td>1400/06/14</td>
                                    <td>1401/06/25</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="نمایش بیشتر" class="btn btn-sm btn-outline-info shadow-none"><i class="fa-solid fa-eye"></i></a>
                                            <a href="#" title="غیرفعال" class="btn btn-sm btn-outline-secondary shadow-none"><i class="fa-solid fa-toggle-off"></i></a> <a href="#" title="فایل ها" class="btn btn-sm btn-outline-dark shadow-none"><i class="fa-solid fa-list-check"></i></a>
                                            <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- modal show more -->
                <div class="modal fade" id="show-more" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">دوره عادت های اتمی</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <img data-src="<?= DOMAIN ?>/public/images/course1.jpg" alt="" class="img-fluid lozad">

                                <div class="card my-3">
                                    <div class="card-body text-wrap text-justify">
                                        <h6 class="fw-bold"><i class="fa-solid fa-receipt text-muted me-2"></i>توضیحات</h6>
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body text-wrap text-justify">
                                        <h6 class="fw-bold"><i class="fa-solid fa-tags text-muted me-2"></i>برچسب ها</h6>
                                        <div class="course-tags">
                                            <a href="#" title="">برچسب 1</a>
                                            <a href="#" title="">برچسب 2</a>
                                            <a href="#" title="">دوره های آموزشی 1</a>
                                            <a href="#" title="">دوره های آموزشی 2</a>
                                            <a href="#" title="">دوره های آموزشی 3</a>
                                            <a href="#" title="">برچسب 3</a>
                                            <a href="#" title="">دوره های آموزشی 4</a>
                                            <a href="#" title="">برچسب 4</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal edit & add -->
                <div class="modal fade" id="form" tabindex="-1">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">دوره</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form action="" method="" class="border-form">
                                    <div class="row">
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="" class="mb-1">نام دوره</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="" class="mb-1">مدرس دوره</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="" class="mb-1">برچسب های دوره</label>
                                            <input id="select_lables">
                                            <small>حداکثر تعداد برچسب ها 23 تا می باشد.</small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="" class="mb-1">دسته بندی دوره</label>
                                            <select class="form-control">
                                                <option disabled selected>انتخاب کنید...</option>
                                                <option>دسته بندی اول</option>
                                                <option>دسته بندی دوم</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="" class="mb-1">سطح دوره</label>
                                            <select class="form-control">
                                                <option disabled selected>انتخاب کنید...</option>
                                                <option>مقدماتی</option>
                                                <option>متوسط</option>
                                                <option>پیشرفته</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="" class="mb-1">وضعیت دوره</label>
                                            <select class="form-control">
                                                <option disabled selected>انتخاب کنید...</option>
                                                <option>در حال برگذاری</option>
                                                <option>به اتمام رسیده</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="" class="mb-1">نوع دوره</label>
                                            <select class="form-control" id="type-course">
                                                <option disabled selected value="">انتخاب کنید...</option>
                                                <option value="money">نقدی</option>
                                                <option value="free">رایگان</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3" id="div-price">
                                            <label for="" class="mb-1">قیمت (تومان)</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="mb-1">توضحیات دوره</label>
                                        <textarea class="form-control" id="description"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="" class="mb-1">ویدیو</label>
                                            <input type="file" class="form-control">
                                            <div class="progress mt-2">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%;">50%</div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="" class="mb-1">تصویر</label>
                                            <input type="file" class="form-control">
                                            <div class="progress mt-2">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%;">50%</div>
                                            </div>
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

    <!-- script -->
    <script>
        // ckeditor
        CKEDITOR.replace('description', {
            language: 'fa'
        });
        
    </script>