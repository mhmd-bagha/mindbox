<!-- modal edit & add -->
<div class="modal fade" id="course_part" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">فایل</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-start">
                <form action="<?= htmlspecialchars(currentUrl()) ?>" method="post" class="border-form"
                      id="form_course_file">
                    <div class="mb-3">
                        <label for="course_file" class="mb-1">فایل دوره</label>
                        <input type="file" class="form-control" id="course_file" accept=".zip, .rar">
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
                    <div class="mb-3">
                        <label for="course_title" class="mb-1">عنوان دوره</label>
                        <input type="text" class="form-control" id="course_title" placeholder="اول">
                    </div>
                    <div class="mb-3">
                        <label for="course_time" class="mb-1">مدت زمان</label>
                        <input type="tel" class="form-control" id="course_time" placeholder="00:00:00" value="00:00:00">
                        <small>فرمت مدت زمان باید به این شکل (00:00:00) باشد.</small>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="course_number" class="mb-1">ترتیب شماره</label>
                            <input type="number" class="form-control" id="course_number" placeholder="36"
                                   value="<?= $this->courses->get_number_part() ?>">
                        </div>
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="course_type" class="mb-1">نوع فایل</label>
                            <select class="form-control" id="course_type">
                                <option value="lock">نقدی</option>
                                <option value="free">رایگان</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-success py-2 px-5" id="btn_course_file">ثبت</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var btn_course_file = $("#btn_course_file")
    var author = "<?= $get_admin->id ?>"
    var form_course_file = $("#form_course_file input")
    var course_id = "<?= explode('/', $_GET['url'])[2] ?>"
    $(document).ready(() => {
        btn_course_file.click(() => {
            var form_data = new FormData()
            var course_file = $("#course_file").prop('files')[0]
            var course_title = $("#course_title").val().trim()
            var course_time = $("#course_time").val().trim()
            var course_number = $("#course_number").val().trim()
            var course_type = $("#course_type").val()
            if (!empty(course_file) && !empty(course_title) && !empty(course_time) && !empty(course_number) && !empty(course_type)) {
                var course_file_name = course_file.name
                if (type_file(course_file_name)) {
                    form_data.append('course_file', course_file)
                    form_data.append('course_title', course_title)
                    form_data.append('course_time', course_time)
                    form_data.append('course_number', course_number)
                    form_data.append('course_type', course_type)
                    form_data.append('course_id', course_id)
                    form_data.append('author', admin_id)
                    form_data.append('btn_course_file', true)
                    course_part(form_data, course_file)
                } else
                    alert_error('<?= errors["format_file"] ?>')
            }
        })
    })

    function course_part(data, file) {
        form_course_file.prop('disabled', true)
        btn_course_file.prop('disabled', true).text('در حال بررسی...').addClass('disabled pointer-events btn_success_dot-flashing')
        $.ajax({
            url: PATH + "/admin_courses/add_file",
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
                        uploadFile(file, obj.data.file_name, 'course_file')
                        setTimeout(() => {
                            alert_success("<?= warnings['file_uploading'] ?>", 'warning')
                        }, 1400)
                        break;
                    case 500:
                        alert_error(message)
                        break;
                }
            },
            error: () => {
                alert_error('خطا در ارسال اطلاعات')
            }
        }).done(() => {
            form_course_file.prop('disabled', false)
            btn_course_file.prop('disabled', false).text('ثبت').removeClass('disabled pointer-events btn_success_dot-flashing')
        })
    }
</script>