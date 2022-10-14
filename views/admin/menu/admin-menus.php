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
            <div class="d-flex justify-content-between align-items-center">
                <h5>منو</h5>
                <a data-bs-toggle="modal" data-bs-target="#form" class="btn btn-primary"><i
                            class="fa-solid fa-plus me-2"></i>ایجاد کردن</a>
            </div>
            <hr>
            <?php require 'menu.php' ?>
            <?php require 'add.php' ?>
        </section>
    </section>
</div>
<!-- admin backdrop -->
<div class="admin-backdrop"></div>