<?php
$data_header = $this->model->where('information', 'information_type', 'header');
if ($data_header) $get_header = json_decode($data_header->information_data);
?>
<!-- content -->
<div class="tab-pane fade show active" id="tab-header">
    <!-- form -->
    <form action="<?= htmlspecialchars(currentUrl()) ?>" method="post" class="border-form" id="form_setting_header">
        <div class="row">
            <div class="col-12 col-sm-6 mb-3">
                <label for="bg_image" class="mb-1">لوگو سرتیتر</label>
                <input type="file" class="form-control" id="bg_image">
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
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-3">
                <label for="bg_color" class="mb-1">رنگ پس زمینه منو</label>
                <input type="color" class="form-control" id="bg_color" value="<?= $data_header ? $get_header->color : '#153248' ?>">
                <small>مقدار رنگ پیشفرض کد #153248 می باشد.</small>
            </div>
        </div>
        <div class="text-end">
            <button type="button" class="btn btn-success py-2 px-5" id="btn_setting_header">ثبت</button>
        </div>
    </form>
</div>
<script>
    var btn_setting_header = $("#btn_setting_header")
    var form_setting_header = $("#form_setting_header")
    $(document).ready(() => {
        btn_setting_header.click(() => {
            var bg_color = $("#bg_color").val().trim()
            var bg_image = $("#bg_image").prop('files')[0]
            var form_data = new FormData()
            form_data.append('color', bg_color)
            form_data.append('image', bg_image)
            form_data.append('btn_setting_header', true)
            header(form_data, bg_image)
        })
    })

    function header(data, image) {
        $.ajax({
            url: PATH + "/admin_information/header",
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
                            uploadFile(image, obj.data.img_name, 'header')
                            setTimeout(() => {
                                alert_success("<?= warnings['file_uploading'] ?>", 'warning')
                            }, 1500)
                        }else
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
</script>