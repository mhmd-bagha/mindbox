<div class="row">
    <?php foreach ($data['slider_all'] as $slider) { ?>
        <!-- slider -->
        <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <!-- image slider -->
                <a href="<?= $slider->slider_link ?>" target="_blank"><img
                            data-src="<?= DL_DOMAIN ?>/public/images/sliders/<?= $slider->slider_image . '/' . $slider->slider_image ?>"
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
                               data-bs-toggle="modal" data-bs-target="#edit_<?= $slider->id ?>"><i
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
                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"
                               onclick="deleteItem(<?= $slider->id ?>, 'sliders', '<?= $this->image_path_dl . 'sliders/' . $slider->slider_image ?>')"><i
                                        class="fa-solid fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="edit_<?= $slider->id ?>" tabindex="-1" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">اسلایدر</h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-start">
                        <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post"
                              class="border-form"
                              enctype="multipart/form-data" id="form_slider_<?= $slider->id ?>">
                            <div class="mb-3">
                                <label for="title_<?= $slider->id ?>" class="mb-1">عنوان</label>
                                <input type="text" class="form-control" id="title_<?= $slider->id ?>"
                                       value="<?= $slider->slider_title ?>">
                            </div>
                            <div class="mb-3">
                                <label for="address_<?= $slider->id ?>" class="mb-1">آدرس</label>
                                <input type="url" class="form-control" id="address_<?= $slider->id ?>"
                                       value="<?= $slider->slider_link ?>">
                            </div>
                            <div class="mb-3">
                                <label for="img_<?= $slider->id ?>" class="mb-1">تصویر</label>
                                <input type="file" class="form-control" id="img_<?= $slider->id ?>"
                                       accept=".jpg, .png, .jpeg">
                                <div id="progressShow_<?= $slider->id ?>" style="display: none">
                                    <div class="progress progress_load">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                             id="progressBar_<?= $slider->id ?>"
                                             role="progressbar"></div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p id="status_<?= $slider->id ?>" class="text-secondary me-2"></p>
                                        <p id="loaded_n_total_<?= $slider->id ?>" class="text-secondary"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-success py-2 px-5"
                                        id="btn_slider_edit_<?= $slider->id ?>"
                                        onclick="slider_edit(<?= $slider->id ?>, 'title_<?= $slider->id ?>', 'address_<?= $slider->id ?>', 'img_<?= $slider->id ?>', 'btn_slider_edit_<?= $slider->id ?>', 'form_slider_<?= $slider->id ?>', 'progressShow_<?= $slider->id ?>', 'loaded_n_total_<?= $slider->id ?>', 'progressBar_<?= $slider->id ?>', 'status_<?= $slider->id ?>')">
                                    ثبت
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<script>
    function slider_edit(id, slider_title, slider_address, slider_img, button, form, progressShow, loaded_n_total, progressBar, status) {
        // form and btn
        var btn_slider = $("#" + button + "")
        var form_slider = $("#" + form + " input")
        // var
        var title = $("#" + slider_title + "").val().trim()
        var address = $("#" + slider_address + "").val().trim()
        var img = $("#" + slider_img + "").prop('files')[0]
        if (!empty(title) && !empty(address)) {
            var form_data = new FormData()
            form_data.append('slider_name', title)
            form_data.append('slider_address', address)
            form_data.append('slider_image', img)
            form_data.append('id', id)
            // disabled form and btn
            form_slider.prop('disabled', true)
            btn_slider.prop('disabled', true).text('در حال بررسی...').addClass('disabled pointer-events btn_success_dot-flashing')
            $.ajax({
                url: PATH + "/admin_sliders/edit",
                type: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: (data) => {
                    let obj = JSON.parse(data)
                    let message = obj.data.message
                    let status_code = obj.statusCode
                    switch (status_code) {
                        case 200:
                            if (!obj.data.upload_img) {
                                alert_success(message)
                                form_slider.prop('disabled', false)
                                btn_slider.prop('disabled', false).text('ثبت').removeClass('disabled pointer-events btn_success_dot-flashing')
                            } else {
                                alert_success(message, 'success', 1400)
                                uploadFile_ajax(img, obj.data.img_name, 'slider', progressShow, loaded_n_total, progressBar, status)
                                setTimeout(() => alert_success("<?= warnings['file_uploading'] ?>", 'warning'), 1500)
                            }
                            break;
                        case 500:
                            alert_error(message)
                            form_slider.prop('disabled', false)
                            btn_slider.prop('disabled', false).text('ثبت').removeClass('disabled pointer-events btn_success_dot-flashing')
                            break;
                    }
                    form_slider.prop('disabled', false)
                    btn_slider.prop('disabled', false).text('ثبت')
                },
                error: () => {
                    alert_error('خطا در ارسال اطلاعات')
                    form_slider.prop('disabled', false)
                    btn_slider.prop('disabled', false).text('ثبت').removeClass('disabled pointer-events btn_success_dot-flashing')
                }
            })
        } else {
            if (empty(title)) alert_error('عنوان اسلایدر اجباری است')
            if (empty(address)) alert_error('لینک اسلایدر اجباری است')
        }
    }
</script>