
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
                <h5>نظرات</h5>
                <hr>
                <!-- card -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <!-- table -->
                        <table id="table" class="table table-borderless table-striped table-hover text-center">
                            <thead class="table-dark text-nowrap sticky-top">
                                <tr>
                                    <th>#</th>
                                    <th>نام دوره</th>
                                    <th>نام و نام خانوادگی کاربر</th>
                                    <th>ایمیل کاربر</th>
                                    <th>شماره همراه کاربر</th>
                                    <th>وضعیت نمایش</th>
                                    <th>تاریخ ثبت</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>دوره عادت های اتمی</td>
                                    <td>محمد ابراهیمی</td>
                                    <td>mohammad@gmail.com </td>
                                    <td>09151234567</td>
                                    <td><span class="badge bg-success p-2">فعال</span></td>
                                    <td>1401/06/01</td>
                                    <td>
                                        <div class="btn-group">
                                            <a data-bs-toggle="modal" data-bs-target="#show-more" title="نمایش بیشتر" class="btn btn-sm btn-outline-info shadow-none"><i class="fa-solid fa-eye"></i></a>
                                            <a href="#" title="غیرفعال" class="btn btn-sm btn-outline-secondary shadow-none"><i class="fa-solid fa-toggle-off"></i></a>
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>دوره سحرخیزی پلاس</td>
                                    <td>عارف مسعودی</td>
                                    <td>aref@gmail.com </td>
                                    <td>09391234567</td>
                                    <td><span class="badge bg-danger p-2">غیرفعال</span></td>
                                    <td>1401/02/06</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="نمایش بیشتر" class="btn btn-sm btn-outline-info shadow-none"><i class="fa-solid fa-eye"></i></a>
                                            <a href="#" title="فعال" class="btn btn-sm btn-outline-success shadow-none"><i class="fa-solid fa-toggle-on"></i></a>
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>دوره دیسپنزا</td>
                                    <td>حسین اکرمی </td>
                                    <td>hossein@gmail.com</td>
                                    <td>09101234567</td>
                                    <td><span class="badge bg-success p-2">فعال</span></td>
                                    <td>1401/01/18</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="نمایش بیشتر" class="btn btn-sm btn-outline-info shadow-none"><i class="fa-solid fa-eye"></i></a>
                                            <a href="#" title="غیرفعال" class="btn btn-sm btn-outline-secondary shadow-none"><i class="fa-solid fa-toggle-off"></i></a>
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
                                <h5 class="modal-title">نظر کاربر</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body text-wrap text-justify">
                                        <!-- user comment -->
                                        <h6 class="fw-bold"><i class="fa-solid fa-user text-muted me-2"></i>محمد ابراهیمی</h6>
                                        <!-- text commennt -->
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                                        <hr>
                                        <!-- button answer -->
                                        <a class="btn btn-primary mb-3" data-bs-toggle="collapse" href="#answer-form">پاسخ</a>
                                        <div class="collapse" id="answer-form">
                                            <!-- answer form -->
                                            <form action="" method="" class="border-form mt-2">
                                                <div class="mb-3">
                                                    <textarea class="form-control" rows="4" placeholder="پاسخ خود را بنویسید..."></textarea>
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
            </section>
        </section>
    </div>
    <!-- admin backdrop -->
    <div class="admin-backdrop"></div>
