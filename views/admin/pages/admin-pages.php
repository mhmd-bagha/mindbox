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
                            <button class="nav-link fw-bold" data-bs-toggle="pill" data-bs-target="#tab-mindbox" type="button">بی بست</button>
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
                                    <button class="nav-link fw-bold" data-bs-toggle="pill" data-bs-target="#tab-history" type="button">داستان ها</button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <?php require 'benefits.php' ?>
                                <?php require 'history.php' ?>
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
</script>