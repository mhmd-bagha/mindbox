
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
                <h5>داشبورد مدیریتی</h5>
                <hr>
                <div class="row mb-4">
                    <!-- users -->
                    <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-sm-4 mb-xl-0">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="bg-info text-white rounded-1 p-4">
                                        <h4><i class="fa-solid fa-users"></i></h4>
                                    </div>
                                    <div class="d-flex flex-column justify-content-between ms-2">
                                        <h6>مجموع کاربران</h6>
                                        <h6 class="fw-bold">500</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- comments -->
                    <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-sm-4 mb-xl-0">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="bg-danger text-white rounded-1 p-4">
                                        <h4><i class="fa-solid fa-comments"></i></h4>
                                    </div>
                                    <div class="d-flex flex-column justify-content-between ms-2">
                                        <h6>مجموع نظرات</h6>
                                        <h6 class="fw-bold">1589</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- tickets -->
                    <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-sm-0 mb-xl-0">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="bg-success text-white rounded-1 p-4">
                                        <h4><i class="fa-solid fa-ticket"></i></h4>
                                    </div>
                                    <div class="d-flex flex-column justify-content-between ms-2">
                                        <h6>مجموع تیکت ها</h6>
                                        <h6 class="fw-bold">358</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- courses -->
                    <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-sm-0 mb-xl-0">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="bg-warning text-white rounded-1 p-4">
                                        <h4><i class="fa-solid fa-display"></i></h4>
                                    </div>
                                    <div class="d-flex flex-column justify-content-between ms-2">
                                        <h6>مجموع دوره ها</h6>
                                        <h6 class="fw-bold">48</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- last users -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-4">آخرین کاربران</h6>
                        <div class="table-responsive">
                            <table class="table table-hover text-nowrap">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>#</th>
                                        <th>نام و نام خانوادگی</th>
                                        <th>شماره همراه</th>
                                        <th>ایمیل</th>
                                        <th>وضعیت کاربر</th>
                                        <th>موجودی کیف پول (تومان)</th>
                                        <th>تاریخ ثبت نام</th>
                                    </tr>
                                </thead>
                                <tbody class="text-muted">
                                    <tr>
                                        <td>1</td>
                                        <td>محمد محمدی</td>
                                        <td>09151234567</td>
                                        <td>mhmd@gmail.com</td>
                                        <td><span class="badge bg-danger p-2">غیرفعال</span></td>
                                        <td>0</td>
                                        <td>1401/06/10</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>زهرا مرادی</td>
                                        <td>09391234567</td>
                                        <td>zahra@gmail.com</td>
                                        <td><span class="badge bg-success p-2">فعال</span></td>
                                        <td>45,000</td>
                                        <td>1401/05/29</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>حسین میری نژاد</td>
                                        <td>09101234567</td>
                                        <td>hossein.mirinejad@gmail.com</td>
                                        <td><span class="badge bg-success p-2">فعال</span></td>
                                        <td>145,000</td>
                                        <td>1401/05/20</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>امید اکرمی</td>
                                        <td>09151234567</td>
                                        <td>omid@gmail.com</td>
                                        <td><span class="badge bg-success p-2">فعال</span></td>
                                        <td>250,000</td>
                                        <td>1401/05/16</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>حسین سیار</td>
                                        <td>09391234567</td>
                                        <td>ho3ein@gmail.com</td>
                                        <td><span class="badge bg-success p-2">فعال</span></td>
                                        <td>98,000</td>
                                        <td>1401/05/29</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- last comments -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="fw-bold mb-4">آخرین نظرات</h6>
                        <hr>
                        <!-- comment -->
                        <div class="card border-0 bg-anti-flash-white shadow-sm mb-4">
                            <div class="card-header bg-transparent pb-0">
                                <div class="d-flex justify-content-between align-items-center text-center">
                                    <p class="text-truncate small"><i class="fa-solid fa-user me-2"></i>محمد ابراهیمی</p>
                                    <p class="text-muted small">1401/05/19</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <span class="text-muted text-justify d-block">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</span>
                            </div>
                        </div>
                        <!-- comment -->
                        <div class="card border-0 bg-anti-flash-white shadow-sm mb-4">
                            <div class="card-header bg-transparent pb-0">
                                <div class="d-flex justify-content-between align-items-center text-center">
                                    <p class="text-truncate small"><i class="fa-solid fa-user me-2"></i>محمد ابراهیمی</p>
                                    <p class="text-muted small">1401/05/19</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <span class="text-muted text-justify d-block">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</span>
                            </div>
                        </div>
                        <!-- comment -->
                        <div class="card border-0 bg-anti-flash-white shadow-sm mb-4">
                            <div class="card-header bg-transparent pb-0">
                                <div class="d-flex justify-content-between align-items-center text-center">
                                    <p class="text-truncate small"><i class="fa-solid fa-user me-2"></i>محمد ابراهیمی</p>
                                    <p class="text-muted small">1401/05/19</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <span class="text-muted text-justify d-block">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</span>
                            </div>
                        </div>
                        <!-- comment -->
                        <div class="card border-0 bg-anti-flash-white shadow-sm mb-4">
                            <div class="card-header bg-transparent pb-0">
                                <div class="d-flex justify-content-between align-items-center text-center">
                                    <p class="text-truncate small"><i class="fa-solid fa-user me-2"></i>محمد ابراهیمی</p>
                                    <p class="text-muted small">1401/05/19</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <span class="text-muted text-justify d-block">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</span>
                            </div>
                        </div>
                        <!-- comment -->
                        <div class="card border-0 bg-anti-flash-white shadow-sm mb-4">
                            <div class="card-header bg-transparent pb-0">
                                <div class="d-flex justify-content-between align-items-center text-center">
                                    <p class="text-truncate small"><i class="fa-solid fa-user me-2"></i>محمد ابراهیمی</p>
                                    <p class="text-muted small">1401/05/19</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <span class="text-muted text-justify d-block">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>
    <!-- admin backdrop -->
    <div class="admin-backdrop"></div>