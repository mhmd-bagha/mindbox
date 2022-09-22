
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
                                   <?php require 'rules.php' ?>
                                    <?php require 'about_me.php' ?>
                                    <?php require 'contact_us.php' ?>
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
