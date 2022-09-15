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
            <!-- dashboard items -->
            <?php require 'section_admin/dashboard_items.php' ?>
            <!-- end users -->
            <?php require 'section_admin/end_users.php' ?>
            <!-- end comment -->
            <?php require 'section_admin/end_comment.php' ?>
        </section>
    </section>
</div>
<!-- admin backdrop -->
<div class="admin-backdrop"></div>