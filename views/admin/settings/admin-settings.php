
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
                            <?php require 'setting-header.php' ?>
                            <?php require 'setting-footer.php' ?>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>
    <!-- admin backdrop -->
    <div class="admin-backdrop"></div>
 