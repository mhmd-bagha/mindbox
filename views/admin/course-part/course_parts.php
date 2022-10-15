<!-- card -->
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <!-- table -->
        <table id="table" class="table table-borderless table-striped table-hover text-center">
            <thead class="table-dark text-nowrap sticky-top">
            <tr>
                <th>#</th>
                <th>فایل دوره</th>
                <th>عنوان فایل</th>
                <th>مدت زمان فایل</th>
                <th>نوع فایل</th>
                <th>ترتیب شماره</th>
                <th>نام دوره</th>
                <th>وضعیت نمایش</th>
                <th>تاریخ ایجاد</th>
                <th>تاریخ بروزرسانی</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['course_files'] as $course_file) { ?>
                <tr>
                    <td><?= $course_file->id ?></td>
                    <td><a href="#">دانلود</a></td>
                    <td><?= $course_file->course_title ?></td>
                    <td><?= $course_file->course_time ?></td>
                    <td><?php switch ($course_file->course_type) {
                            case "lock":
                                echo "نقدی";
                                break;
                            case "free":
                                echo "رایگان";
                                break;
                        } ?></td>
                    <td><?= $course_file->number_part ?></td>
                    <td><?= $get_name_course = $this->model->where('courses', 'id', $course_file->course_id)->course_title ?></td>
                    <td><?php switch ($course_file->status_show) {
                            case "show":
                                ?>
                                <span class="badge bg-success p-2">فعال</span>
                                <?php break;
                            case "hide":
                                ?>
                                <span class="badge bg-danger p-2">غیرفعال</span>
                                <?php
                                break;
                        } ?></td>
                    <td><?= $course_file->create_time ?></td>
                    <td><?php switch ($course_file->update_time) {
                            case !null:
                                echo $course_file->update_time;
                                break;
                            case null:
                                echo 'بدون بروزرسانی';
                                break;
                        } ?></td>
                    <td>
                        <div class="btn-group">
                            <?php switch ($course_file->status_show) {
                                case "hide":
                                    ?>
                                    <a href="#" title="غیرفعال"
                                       class="btn btn-sm btn-outline-secondary shadow-none"
                                       onclick="enable('<?= $course_file->id ?>', 'آیا میخواهید این فایل را را فعال کنید؟', 'course_files')"><i
                                                class="fa-solid fa-toggle-off"></i></a>
                                    <?php break;
                                case "show": ?>
                                    <a href="#" title="فعال"
                                       class="btn btn-sm btn-outline-success shadow-none"
                                       onclick="disable('<?= $course_file->id ?>', 'آیا میخواهید این فایل را غیر فعال کنید؟', 'course_files')"><i
                                                class="fa-solid fa-toggle-on"></i></a>
                                    <?php break;
                            } ?>
                            <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"
                               data-bs-toggle="modal" data-bs-target="#course_part_edit_<?= $course_file->id ?>"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                        </div>
                    </td>
                </tr>
                <!-- modal edit -->
                <div class="modal fade" id="course_part_edit_<?= $course_file->id ?>" tabindex="-1"
                     data-bs-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">فایل</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form action="<?= htmlspecialchars(currentUrl()) ?>" method="post" class="border-form"
                                      id="form_course_file_edit_<?= $course_file->id ?>">
                                    <div class="mb-3">
                                        <label for="course_file_edit_<?= $course_file->id ?>" class="mb-1">فایل
                                            دوره</label>
                                        <input type="file" class="form-control"
                                               id="course_file_edit_<?= $course_file->id ?>" accept=".zip, .rar">
                                        <div id="progressShow_edit_<?= $course_file->id ?>" style="display: none">
                                            <div class="progress progress_load">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                     id="progressBar_edit_<?= $course_file->id ?>"
                                                     role="progressbar"></div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <p id="status_edit_<?= $course_file->id ?>"
                                                   class="text-secondary me-2"></p>
                                                <p id="loaded_n_total_edit_<?= $course_file->id ?>"
                                                   class="text-secondary"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="course_title_edit_<?= $course_file->id ?>" class="mb-1">عنوان
                                            دوره</label>
                                        <input type="text" class="form-control"
                                               id="course_title_edit_<?= $course_file->id ?>" placeholder="اول"
                                               value="<?= $course_file->course_title ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="course_time_edit_<?= $course_file->id ?>" class="mb-1">مدت
                                            زمان</label>
                                        <input type="tel" class="form-control"
                                               id="course_time_edit_<?= $course_file->id ?>" placeholder="00:00:00"
                                               value="<?= $course_file->course_time ?>">
                                        <small>فرمت مدت زمان باید به این شکل (00:00:00) باشد.</small>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-3">
                                            <label for="course_number_edit_<?= $course_file->id ?>" class="mb-1">ترتیب
                                                شماره</label>
                                            <input type="number" class="form-control"
                                                   id="course_number_edit_<?= $course_file->id ?>"
                                                   placeholder="36"
                                                   value="<?= $course_file->number_part ?>">
                                        </div>
                                        <div class="col-12 col-sm-6 mb-3">
                                            <label for="course_type_edit_<?= $course_file->id ?>" class="mb-1">نوع
                                                فایل</label>
                                            <select class="form-control" id="course_type_edit_<?= $course_file->id ?>">
                                                <option disabled selected>انتخاب کنید...</option>
                                                <?php switch ($course_file->course_type) {
                                                    case "free":
                                                        ?>
                                                        <option value="<?= $course_file->course_type ?>"
                                                                selected>رایگان
                                                        </option>
                                                        <option value="lock">نقدی</option>
                                                        <?php break;
                                                    case "lock": ?>
                                                        <option value="<?= $course_file->course_type ?>"
                                                                selected>نقدی
                                                        </option>
                                                        <option value="free">رایگان</option>
                                                        <?php break;
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="button" class="btn btn-success py-2 px-5"
                                                id="btn_course_file_edit_<?= $course_file->id ?>"
                                                onclick="course_part_edit(<?= $course_file->id ?>, 'btn_course_file_edit_<?= $course_file->id ?>', 'form_course_file_edit_<?= $course_file->id ?>', 'course_file_edit_<?= $course_file->id ?>', 'course_title_edit_<?= $course_file->id ?>', 'course_time_edit_<?= $course_file->id ?>', 'course_number_edit_<?= $course_file->id ?>', 'course_type_edit_<?= $course_file->id ?>', 'progressShow_edit_<?= $course_file->id ?>', 'loaded_n_total_edit_<?= $course_file->id ?>', 'progressBar_edit_<?= $course_file->id ?>', 'status_edit_<?= $course_file->id ?>')">
                                            ثبت
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function course_part_edit(id, button, form, file, title, time, number, type, progressShow, loaded_n_total, progressBar, status) {
        // form and btn
        var btn_course_file = $("#" + button + "")
        var form_course_file = $("#" + form + " input")
        // var
        var course_file = $("#" + file + "").prop('files')[0]
        var course_title = $("#" + title + "").val().trim()
        var course_time = $("#" + time + "").val().trim()
        var course_number = $("#" + number + "").val().trim()
        var course_type = $("#" + type + "").val()
        // check n't empty
        if (!empty(course_title) && !empty(course_time) && !empty(course_number) && !empty(course_type)) {
            // form data append
            var form_data = new FormData()
            form_data.append('course_file', course_file)
            form_data.append('course_title', course_title)
            form_data.append('course_time', course_time)
            form_data.append('course_number', course_number)
            form_data.append('course_type', course_type)
            form_data.append('id', id)
            // disable form and btn
            form_course_file.prop('disabled', true)
            btn_course_file.prop('disabled', true).text('در حال بررسی...').addClass('disabled pointer-events btn_success_dot-flashing')
            $.ajax({
                url: PATH + "/admin_courses/edit_file",
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
                            if (!obj.data.upload_file) {
                                alert_success(message)
                                setTimeout(() => location.reload(), 3000)
                            } else {
                                alert_success(message, 'success', 1400)
                                uploadFile_ajax(course_file, obj.data.file_name, 'course_file', progressShow, loaded_n_total, progressBar, status)
                                setTimeout(() => alert_success("<?= warnings['file_uploading'] ?>", 'warning'), 1400)
                            }
                            break;
                        case 500:
                            alert_error(message)
                            break;
                    }
                },
                error: () => {
                    alert_error('خطا در ارسال اطلاعات')
                    form_course_file.prop('disabled', false)
                    btn_course_file.prop('disabled', false).text('ثبت').removeClass('disabled pointer-events btn_success_dot-flashing')
                }
            })
        } else {
            if (empty(course_title)) alert_error('فیلد عنوان دوره اجباری است')
            if (empty(course_time)) alert_error('فیلد مدت زمان اجباری است')
            if (empty(course_number)) alert_error('فیلد ترتیب شماره اجباری است')
            if (empty(course_type)) alert_error('فیلد نوع فایل اجباری است')
        }
    }
</script>