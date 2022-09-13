
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
                <h5>تنظیمات</h5>
                <hr>
                <!-- card -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <ul class="nav nav-pills text-nowrap nav-custom mb-3">
                            <li class="nav-item">
                                <button class="nav-link fw-bold active" data-bs-toggle="pill" data-bs-target="#tab-header" type="button">سرتیتر</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fw-bold" data-bs-toggle="pill" data-bs-target="#tab-footer" type="button">پاورقی</button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- content -->
                            <div class="tab-pane fade show active" id="tab-header">
                                <!-- form -->
                                <form action="" method="" class="border-form">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-3">
                                            <label for="" class="mb-1">لوگو سرتیتر</label>
                                            <input type="file" class="form-control">
                                            <div class="progress mt-2">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%;">50%</div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-3">
                                            <label for="" class="mb-1">رنگ پس زمینه منو</label>
                                            <input type="color" class="form-control">
                                            <small>مقدار رنگ پیشفرض کد #153248 می باشد.</small>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success">ثبت</button>
                                    </div>
                                </form>
                            </div>
                            <!-- content -->
                            <div class="tab-pane fade" id="tab-footer">
                                <!-- form -->
                                <form action="" method="" class="border-form">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-md-6 mb-3">
                                            <label for="" class="mb-1">عنوان</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-3">
                                            <label for="" class="mb-1">رنگ پس زمینه پاورقی</label>
                                            <input type="color" class="form-control">
                                            <small>مقدار رنگ پیشفرض کد #153248 می باشد.</small>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="mb-1">متن</label>
                                        <textarea rows="8" class="form-control"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="" class="mb-1">نماد اول</label>
                                            <input type="file" class="form-control">
                                            <div class="progress mt-2">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%;">50%</div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="" class="mb-1">نماد دوم</label>
                                            <input type="file" class="form-control">
                                            <div class="progress mt-2">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%;">50%</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="" class="mb-1">نماد سوم</label>
                                            <input type="file" class="form-control">
                                            <div class="progress mt-2">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%;">50%</div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="" class="mb-1">لوگو پاورقی</label>
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
 