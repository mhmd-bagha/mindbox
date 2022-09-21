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
                <h5>تیکت ها</h5>
                <a href="<?= DOMAIN ?>/admin/tickets" class="btn btn-primary"><i
                            class="fa-solid fa-arrow-right me-2"></i>بازگشت</a>
            </div>
            <hr>
            <div class="card border-0 shadow-sm">
                <?php require 'section_admin/ticket_information.php' ?>
                <?php require 'section_admin/ticket_chat.php' ?>
            </div>
        </section>
    </section>
</div>
<!-- admin backdrop -->
<div class="admin-backdrop"></div>
