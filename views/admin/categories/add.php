<!-- modal edit & add -->
<div class="modal fade" id="form" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">دسته بندی</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-start">
                <form action="<?= htmlspecialchars(currentUrl()) ?>" method="post" class="border-form"
                      id="form_category">
                    <div class="mb-3">
                        <label for="title_category" class="mb-1">نام</label>
                        <input type="text" class="form-control" id="title_category">
                    </div>
                    <div class="mb-3">
                        <label for="img_category" class="mb-1">تصویر</label>
                        <input type="file" class="form-control" id="img_category">
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
                        <button type="button" class="btn btn-success" id="btn_category">ثبت</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var btn_category = $("#btn_category")
    var form_category = $("#form_category input button")
    var author = "<?= $get_admin->id ?>"
    $(document).ready(() => {
        btn_category.click(() => {
            var title_category = $("#title_category").val()
            var img_category = $("#img_category").prop('files')[0]
            if (!empty(title_category) && !empty(img_category)) {
                var formData = new FormData()
                formData.append('category_name', title_category)
                formData.append('category_image', img_category)
                formData.append('author', author)
                formData.append('btn_category', true)
                category(formData, img_category)
            } else {
                if (empty(title_category))
                    alert_error('عنوان دسته بندی اجباری است')
                if (empty(img_category))
                    alert_error('تصویر دسته بندی اجباری است')
            }
        })
    })

    function category(data, image) {
        form_category.prop('disabled', true)
        btn_category.prop('disabled', false).text('در حال افزودن')
        $.ajax({
            url: PATH + "/admin_categories/add",
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
                        uploadFile(image, obj.data.img_name, 'category')
                        setTimeout(() => {
                            alert_success("<?= warnings['file_uploading'] ?>", 'warning')
                        }, 1500)
                        break;
                    case 500:
                        alert_error(message)
                        break;
                }
                form_category.prop('disabled', false)
                btn_category.prop('disabled', false).text('ثبت')
            },
            error: () => {
                alert_error('خطا در ارسال اطلاعات')
                form_category.prop('disabled', false)
                btn_category.prop('disabled', false).text('ثبت')
            }
        })
    }
</script>