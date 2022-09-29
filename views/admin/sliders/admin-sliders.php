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
            <div class="d-flex justify-content-between align-items-center">
                <h5>اسلایدر ها</h5>
                <a data-bs-toggle="modal" data-bs-target="#form" class="btn btn-primary"><i
                            class="fa-solid fa-plus me-2"></i>ایجاد کردن</a>
            </div>
            <hr>
            <?php require 'sliders.php' ?>
        </section>
    </section>
</div>
<?php require 'add.php' ?>
<!-- admin backdrop -->
<div class="admin-backdrop"></div>
<script>
    var path = "<?= DOMAIN ?>/admin_sliders/get_slider_id/"

    function get_data_slider_id(id) {
        var get_data = get_data_item(id, path)

        console.log(get_data)

    }
</script>