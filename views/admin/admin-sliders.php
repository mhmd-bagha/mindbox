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
                <h5>اسلایدر ها</h5>
                <a data-bs-toggle="modal" data-bs-target="#form" class="btn btn-primary"><i
                            class="fa-solid fa-plus me-2"></i>ایجاد کردن</a>
            </div>
            <hr>
            <div class="row">
                <?php foreach ($data['slider_all'] as $slider) { ?>
                    <!-- slider -->
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <!-- image slider -->
                            <a href="#"><img data-src="<?= DOMAIN ?>/public/images/<?= $slider->slider_image ?>" alt=""
                                             class="card-img-top lozad"/></a>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="text-truncate mb-0"><?= $slider->slider_title ?></h6>
                                    <?php switch ($slider->status_show) {
                                        case "show":
                                            ?><span class="badge bg-success p-2">فعال</span><?php break;
                                        case "hide":
                                            ?><span class="badge bg-danger p-2">غیر فعال</span><?php break;
                                    } ?>
                                </div>
                            </div>
                            <div class="card-footer bg-white text-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted"><?= $slider->create_time ?></span>
                                    <div class="btn-group">
                                        <a href="#" title="فعال" class="btn btn-sm btn-outline-success shadow-none"><i
                                                    class="fa-solid fa-toggle-on"></i></a>
                                        <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i
                                                    class="fa-solid fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </section>
</div>
<!-- admin backdrop -->
<div class="admin-backdrop"></div>
