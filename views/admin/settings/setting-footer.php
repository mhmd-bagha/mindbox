<?php
$data_footer = $this->model->where('information', 'information_type', 'footer');
if ($data_footer) $get_footer = json_decode($data_footer->information_data);
?>
<!-- content -->
<div class="tab-pane fade" id="tab-footer">
    <!-- form -->
    <form action="<?= htmlspecialchars(currentUrl()) ?>" method="post" class="border-form" id="form_setting_footer">
        <div class="row">
            <div class="col-12 col-sm-4 mb-3">
                <label for="footer_title" class="mb-1">عنوان</label>
                <input type="text" class="form-control" id="footer_title"
                       value="<?= $data_footer ? $get_footer->title : '' ?>">
            </div>
            <div class="col-12 col-sm-4 mb-3">
                <label for="footer_color" class="mb-1">رنگ پس زمینه پاورقی</label>
                <input type="color" class="form-control" id="footer_color"
                       value="<?= $data_footer ? $get_footer->color : '#153248' ?>">
                <small>مقدار رنگ پیشفرض کد #153248 می باشد.</small>
            </div>
            <div class="col-12 col-sm-4 mb-3">
                <label for="footer_symbol" class="mb-1">نماد</label>
                <input type="file" class="form-control" id="footer_symbol" multiple>
                <div id="progressShow" style="display: none">
                    <div class="progress progress_load">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" id="progressBar"
                             role="progressbar"></div>
                    </div>
                    <div class="d-flex justify-content-start">
                        <p id="status" class="text-secondary me-2"></p>
                        <p id="loaded_n_total" class="text-secondary"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="footer_description" class="mb-1">متن</label>
            <textarea rows="8" class="form-control"
                      id="footer_description"><?= $data_footer ? $get_footer->description : '' ?></textarea>
        </div>
        <div class="text-end">
            <button type="button" class="btn btn-success py-2 px-5" id="btn_setting_footer">ثبت</button>
        </div>
    </form>
    <?php if ($data_footer): ?>
        <div class="my-4">
            <div class="d-flex align-items-center">
                <?php foreach ($get_footer->symbols as $symbol): ?>
                    <div class="card border-0 shadow-none symbol_footer_edit">
                        <img src="<?= DOMAIN ?>/public/images/public-images/logo-symbol/<?= $symbol ?>/<?= $symbol ?>"
                             alt="نمادها"
                             class="bg-white rounded p-2" width="120" height="120">
                        <button class="btn border-0 shadow-none" onclick="delete_symbol_footer('<?= $symbol ?>')"><i
                                    class="fa fa-trash text-danger pointer fs-6"></i></button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<script>
    var btn_setting_footer = $("#btn_setting_footer")
    var form_setting_footer = $("#form_setting_footer")
    $(document).ready(() => {
        btn_setting_footer.click(() => {
            var footer_title = $("#footer_title").val().trim()
            var bg_color = $("#footer_color").val().trim()
            var footer_description = $("#footer_description").val().trim()
            var bg_image = $("#footer_symbol").prop('files')[0]
            var form_data = new FormData()
            form_data.append('title', footer_title)
            form_data.append('color', bg_color)
            form_data.append('description', footer_description)
            form_data.append('images', bg_image)
            form_data.append('btn_setting_footer', true)
            footer(form_data, bg_image)
        })
    })

    function footer(data, image) {
        $.ajax({
            url: PATH + "/admin_information/footer",
            type: "POST",
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            success: (data) => {
                let obj = JSON.parse(data)
                let message = obj.data.message
                let status_code = obj.statusCode
                switch (status_code) {
                    case 200:
                        alert_success(message, 'success', 1400)
                        var img_upload = obj.data.img_upload
                        if (img_upload) {
                            uploadFile(image, obj.data.img_name, 'footer')
                            setTimeout(() => {
                                alert_success("<?= warnings['file_uploading'] ?>", 'warning')
                            }, 1500)
                        } else
                            alert_success(message)
                        break;
                    case 500:
                        alert_error(message)
                        break;
                }
            },
            error: () => {
                alert_error('خطا در تغییر تنظمیات')
            }
        })
    }

    function delete_symbol_footer(image) {
        if (confirm('آیا از حذف این نماد مطمئن هستید؟')) {
            $.ajax({
                url: PATH + "/admin_information/delete_symbol_footer",
                type: "POST",
                data: {image: image},
                success: (data) => {
                    let obj = JSON.parse(data)
                    let message = obj.data.message
                    let status_code = obj.statusCode
                    switch (status_code) {
                        case 200:
                            alert_success(message)
                            setTimeout(() => {
                                location.reload()
                            }, 3000)
                            break;
                        case 500:
                            alert_error(message)
                            break;
                    }
                },
                error: () => {
                    alert_error('خطا در حذف نماد')
                }
            })
        }
    }
</script>