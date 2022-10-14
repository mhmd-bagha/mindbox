<div class="container-fluid">
    <!-- sidebar -->
    <?php
    require_once(DIR_ROOT . "/views/admin/admin-menu.php");
    ?>
    <!-- content wrapper -->
    <section class="content-wrapper">
        <!-- header content -->
        <?php
        require_once(DIR_ROOT . "/views/admin/admin-header.php");
        ?>
        <!-- main content -->
        <section class="main-content px-3">
            <?php require 'add.php' ?>
            <hr>
            <?php require 'wallet.php' ?>
        </section>
    </section>
</div>
<!-- admin backdrop -->
<div class="admin-backdrop"></div>
