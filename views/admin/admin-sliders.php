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
                            <a href="<?= DOMAIN ?>"><img
                                        data-src="<?= DOMAIN ?>/public/images/<?= $slider->slider_image ?>"
                                        alt="<?= $slider->slider_title ?>"
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
                                        <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"
                                           onclick="get_data_slider_id('<?= $slider->id ?>')"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="<?= DOMAIN ?>/admin_sliders/get_id/<?= $slider->id ?>" title="حذف"
                                           class="btn btn-sm btn-outline-danger shadow-none"><i
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
<div class="modal fade" id="form" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">اسلایدر</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-start">
                <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post" class="border-form"
                      enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="mb-1">عنوان</label>
                        <input type="text" class="form-control" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="mb-1">آدرس</label>
                        <input type="url" class="form-control" id="address">
                    </div>
                    <div class="mb-3">
                        <label for="img" class="mb-1">تصویر</label>
                        <input type="file" class="form-control" id="img">
                        <div class="progress mt-2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                 style="width: 50%;">50%
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-success" id="btn-slider">ثبت</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- admin backdrop -->
<div class="admin-backdrop"></div>
<script>
    var path = "<?= DOMAIN ?>/admin/get_slider_id/"

    function get_data_slider_id(id) {
        var get_data = get_data_item(id, path)

        console.log(get_data)

    }
</script>