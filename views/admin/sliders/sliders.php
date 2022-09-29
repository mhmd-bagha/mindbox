<div class="row">
    <?php foreach ($data['slider_all'] as $slider) { ?>
        <!-- slider -->
        <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <!-- image slider -->
                <a href="<?= DOMAIN ?>" target="_blank"><img
                        data-src="<?= DOMAIN ?>/public/images/sliders/<?= $slider->slider_image . '/' . $slider->slider_image ?>"
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
                            <?php switch ($slider->status_show) {
                                case "hide":
                                    ?>
                                    <a href="#" title="غیرفعال"
                                       class="btn btn-sm btn-outline-secondary shadow-none"
                                       onclick="enable('<?= $slider->id ?>', 'آیا میخواهید این اسلایدر را را فعال کنید؟', 'sliders')"><i
                                                class="fa-solid fa-toggle-off"></i></a>
                                    <?php break;
                                case "show": ?>
                                    <a href="#" title="فعال"
                                       class="btn btn-sm btn-outline-success shadow-none"
                                       onclick="disable('<?= $slider->id ?>', 'آیا میخواهید این اسلایدر را غیر فعال کنید؟', 'sliders')"><i
                                                class="fa-solid fa-toggle-on"></i></a>
                                    <?php break;
                            } ?>
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