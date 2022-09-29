<div class="modal fade" id="form" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">اسلایدر</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-start">
                <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post" class="border-form"
                      enctype="multipart/form-data" id="form_slider">
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
                    <div class="text-end">
                        <button type="button" class="btn btn-success" id="btn_slider">ثبت</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var btn_slider = $("#btn_slider")
    var form_slider = $("#form_slider input button")
    $(document).ready(() => {
        btn_slider.click(() => {
            var title = $("#title").val().trim()
            var address = $("#address").val().trim()
            var img = $("#img").prop('files')[0]
            if (!empty(title) && !empty(address) && !empty(img)) {
                var form_data = new FormData()
                form_data.append('slider_name', title)
                form_data.append('slider_address', address)
                form_data.append('slider_image', img)
                form_data.append('author', admin_id)
                form_data.append('btn_slider', true)
                slider(form_data, img)
            } else {
                if (empty(title)) alert_error('عنوان اسلایدر اجباری است')
                if (empty(address)) alert_error('لینک اسلایدر اجباری است')
                if (empty(img.name)) alert_error('تصویر اسلایدر اجباری است')
            }
        })
    })

    function slider(data, image) {
        form_slider.prop('disabled', true)
        btn_slider.prop('disabled', false).text('در حال افزودن')
        $.ajax({
            url: PATH + "/admin_sliders/add",
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
                        uploadFile(image, obj.data.img_name, 'slider')
                        setTimeout(() => {
                            alert_success("<?= warnings['file_uploading'] ?>", 'warning')
                        }, 1500)
                        break;
                    case 500:
                        alert_error(message)
                        break;
                }
                form_slider.prop('disabled', false)
                btn_slider.prop('disabled', false).text('ثبت')
            },
            error: () => {
                alert_error('خطا در ارسال اطلاعات')
                form_slider.prop('disabled', false)
                btn_slider.prop('disabled', false).text('ثبت')
            }
        })
    }
</script>