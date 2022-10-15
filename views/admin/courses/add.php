<!-- modal edit & add -->
<div class="modal fade" id="add_course" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">دوره</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-start">
                <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post" class="border-form"
                      id="form_course">
                    <div class="row">
                        <div class="col-12 col-md-4 mb-3">
                            <label for="course_name" class="mb-1">نام دوره</label>
                            <input type="text" class="form-control" id="course_name">
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label for="course_teacher_name_show" class="mb-1">مدرس دوره</label>
                            <input type="text" class="form-control disabled" disabled
                                   value="<?= $get_admin->first_name . ' ' . $get_admin->last_name ?>"
                                   id="course_teacher_name_show">
                            <input type="hidden" class="form-control"
                                   value="<?= $get_admin->id ?>"
                                   id="course_teacher_name">
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label for="course_labels" class="mb-1">برچسب های دوره</label>
                            <input id="course_labels">
                            <small>حداکثر تعداد برچسب ها 23 تا می باشد.</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4 mb-3">
                            <label for="course_category" class="mb-1">دسته بندی دوره</label>
                            <select class="form-control" id="course_category">
                                <option disabled selected>انتخاب کنید...</option>
                                <?php $categories = $this->model->where_all('categories', 'status_show', 'show');
                                foreach ($categories as $category) { ?>
                                    <option value="<?= $category->id ?>"><?= $category->category_title ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label for="course_level" class="mb-1">سطح دوره</label>
                            <select class="form-control" id="course_level">
                                <option disabled selected>انتخاب کنید...</option>
                                <option value="preliminary">مقدماتی</option>
                                <option value="medium">متوسط</option>
                                <option value="advanced">پیشرفته</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label for="course_status" class="mb-1">وضعیت دوره</label>
                            <select class="form-control disabled" id="course_status" disabled>
                                <option value="performing" selected>در حال برگذاری</option>
                                <option value="finished">تمام شده</option>
                                <option value="stopped">متوقف شده</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="course_type" class="mb-1">نوع دوره</label>
                            <select class="form-control" id="course_type">
                                <option disabled selected value="">انتخاب کنید...</option>
                                <option value="money">نقدی</option>
                                <option value="free">رایگان</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 mb-3" id="div-price">
                            <label for="course_price" class="mb-1">قیمت (تومان)</label>
                            <input type="tel" class="form-control" id="course_price">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="course_description" class="mb-1">توضحیات دوره</label>
                        <textarea class="form-control" id="course_description"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="course_video_demo" class="mb-1">ویدیو</label>
                            <input type="url" class="form-control" id="course_video_demo"
                                   placeholder="https://example.com">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="course_image" class="mb-1">تصویر</label>
                            <input type="file" class="form-control" id="course_image">
                            <div id="progressShow" style="display: none">
                                <div class="progress progress_load">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                                         id="progressBar"
                                         role="progressbar"></div>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <p id="status" class="text-secondary me-2"></p>
                                    <p id="loaded_n_total" class="text-secondary"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-success px-5 py-2" id="btn_course">ثبت</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var for_data = new FormData()
    var btn_course = $("#btn_course")
    var form_course = $("#form_course input, #form_course select, #form_course textarea")
    $(document).ready(() => {
        btn_course.click(() => {
            var course_name = $("#course_name").val().trim()
            var course_teacher_name = $("#course_teacher_name").val().trim()
            var course_labels = $("#course_labels").val().trim()
            var course_category = $("#course_category").val()
            var course_level = $("#course_level").val()
            var course_status = $("#course_status").val()
            var course_type = $("#course_type").val()
            var course_price = $("#course_price").val().trim()
            var course_description = $("#course_description").val().trim()
            var course_demo_video_type = 'external_video'
            var course_video_demo = $("#course_video_demo").val().trim()
            var course_image = $("#course_image").prop('files')[0]
            for_data.append('course_name', course_name)
            for_data.append('course_teacher_name', course_teacher_name)
            for_data.append('course_labels', course_labels)
            for_data.append('course_category', course_category)
            for_data.append('course_level', course_level)
            for_data.append('course_status', course_status)
            for_data.append('course_type', course_type)
            for_data.append('course_price', course_price)
            for_data.append('course_description', course_description)
            for_data.append('course_demo_video_type', course_demo_video_type)
            for_data.append('course_video_demo', course_video_demo)
            for_data.append('course_image', course_image)
            for_data.append('author', admin_id)
            for_data.append('btn_course', true)
            course(for_data)
        })
    })

    function course(data) {
        btn_course.prop('disabled', true).text('در حال بررسی...').addClass('disabled pointer-events btn_success_dot-flashing')
        form_course.prop('disabled', true)
        $.ajax({
            url: PATH + "/admin_courses/add",
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
                        $("#add_course").modal('hide')
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
                alert_error('خطا در اضافه کردن دوره')
            },
        }).done(() => {
            btn_course.prop('disabled', false).text('ثبت').removeClass('disabled pointer-events btn_success_dot-flashing')
            form_course.prop('disabled', false)

        })
    }
</script>