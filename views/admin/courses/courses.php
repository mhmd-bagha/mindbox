<!-- card -->
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <!-- table -->
        <table id="table" class="table table-borderless table-striped table-hover text-center">
            <thead class="table-dark text-nowrap sticky-top">
            <tr>
                <th>#</th>
                <th>ویدیو دمو دوره</th>
                <th>نام دوره</th>
                <th>مدرس دوره</th>
                <th>نوع دوره</th>
                <th>تعداد جلسات</th>
                <th>قیمت دوره (تومان)</th>
                <th>درصد تخفیف</th>
                <th>سطح دوره</th>
                <th>وضعیت دوره</th>
                <th>وضعیت نمایش</th>
                <th>تاریخ ایجاد</th>
                <th>تاریخ بروزرسانی</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['courses_all'] as $course) { ?>
                <tr>
                    <td><?= $course->id ?></td>
                    <td><a href="<?php switch ($course->course_demo_video_type) {
                            case 'internal_video':
                                echo DOMAIN . "/public/courses-demo/$course->course_title-$course->id/$course->course_title-$course->id";
                                break;
                            case 'external_video':
                                echo $course->course_demo_video;
                                break;
                        } ?>" target="_blank">دانلود</a></td>
                    <td><?= $course->course_title ?></td>
                    <td><?= $course->course_teacher ?></td>
                    <td><?php switch ($course->course_type) {
                            case "free":
                                echo "رایگان";
                                break;
                            case "money":
                                echo "پولی";
                                break;
                        } ?></td>
                    <td><?= $get_count_file = $this->model->count_where('course_files', 'course_id', $course->id); ?></td>
                    <td><?php switch ($course->course_price) {
                            case !null:
                                echo number_format($course->course_price);
                                break;
                            case null:
                                echo "بدون قیمت";
                                break;
                        } ?></td>
                    <td><?php switch ($course->course_discount) {
                            case !null:
                                echo '%' . $course->course_discount;
                                break;
                            case null:
                                echo 'بدون تخفیف';
                                break;
                        } ?></td>
                    <td><?php switch ($course->course_level) {
                            case "preliminary":
                                echo "نقره‌ای";
                                break;
                            case "medium":
                                echo "طلایی";
                                break;
                            case "advanced":
                                echo "الماسی";
                                break;
                        } ?></td>
                    <td><?php switch ($course->course_status) {
                            case "performing":
                                echo "در حال برگذاری";
                                break;
                            case "stopped":
                                echo "متوقف شده";
                                break;
                            case "finished":
                                echo "تمام شده";
                                break;
                        } ?></td>
                    <td><?php switch ($course->status_show) {
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
                    <td><?= $course->create_time ?></td>
                    <td><?php switch ($course->update_time) {
                            case !null:
                                echo $course->update_time;
                                break;
                            case null:
                                echo 'بدون بروزرسانی';
                                break;
                        } ?></td>
                    <td>
                        <div class="btn-group">
                            <a data-bs-toggle="modal" data-bs-target="#show-more-<?= $course->id ?>" title="نمایش بیشتر"
                               class="btn btn-sm btn-outline-info shadow-none"><i
                                        class="fa-solid fa-eye"></i></a>
                            <?php switch ($course->status_show) {
                                case "hide":
                                    ?>
                                    <a href="#" title="غیرفعال"
                                       class="btn btn-sm btn-outline-secondary shadow-none"
                                       onclick="enable('<?= $course->id ?>', 'آیا میخواهید این دوره را را فعال کنید؟', 'courses')"><i
                                                class="fa-solid fa-toggle-off"></i></a>
                                    <?php break;
                                case "show": ?>
                                    <a href="#" title="فعال"
                                       class="btn btn-sm btn-outline-success shadow-none"
                                       onclick="disable('<?= $course->id ?>', 'آیا میخواهید این دوره را غیر فعال کنید؟', 'courses')"><i
                                                class="fa-solid fa-toggle-on"></i></a>
                                    <?php break;
                            } ?>
                            <a href="<?= DOMAIN ?>/admin/course_part/<?= $course->id ?>" target="_blank" title="فایل ها"
                               class="btn btn-sm btn-outline-dark shadow-none"><i
                                        class="fa-solid fa-list-check"></i></a>
                            <a data-bs-toggle="modal" data-bs-target="#edit_course_<?= $course->id ?>"
                               class="btn btn-sm btn-outline-primary shadow-none"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                        </div>
                    </td>
                </tr>
                <!-- modal edit -->
                <div class="modal fade" id="edit_course_<?= $course->id ?>" tabindex="-1">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">دوره</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post"
                                      class="border-form"
                                      id="form_course_edit_<?= $course->id ?>">
                                    <div class="row">
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="course_name_edit_<?= $course->id ?>" class="mb-1">نام
                                                دوره</label>
                                            <input type="text" class="form-control"
                                                   id="course_name_edit_<?= $course->id ?>"
                                                   value="<?= $course->course_title ?>">
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="course_teacher_name_<?= $course->id ?>" class="mb-1">مدرس
                                                دوره</label>
                                            <input type="text" class="form-control disabled" disabled
                                                   value="<?php $course_teacher = $this->model->where('admins', 'id', $course->course_teacher);
                                                   echo $course_teacher->first_name . ' ' . $course_teacher->last_name ?>"
                                                   id="course_teacher_name_<?= $course->id ?>">
                                            <input type="hidden" class="form-control"
                                                   value="<?= $course->course_teacher ?>"
                                                   id="course_teacher_name_edit_<?= $course->id ?>">
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="course_labels_edit_<?= $course->id ?>" class="mb-1">برچسب های
                                                دوره</label>
                                            <input id="course_labels_edit_<?= $course->id ?>"
                                                   value="<?= $course->course_labels ?>">
                                            <small>حداکثر تعداد برچسب ها 23 تا می باشد.</small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="course_category_edit_<?= $course->id ?>" class="mb-1">دسته بندی
                                                دوره</label>
                                            <select class="form-control" id="course_category_edit_<?= $course->id ?>">
                                                <option value="<?= $course->category_id ?>"
                                                        selected><?= $this->model->where('categories', 'id', $course->category_id)->category_title ?></option>
                                                <?php $categories = $this->model->where_all('categories', 'status_show', 'show');
                                                foreach ($categories as $category) {
                                                    if ($category->id != $course->category_id):?>
                                                        <option value="<?= $category->id ?>"><?= $category->category_title ?></option>
                                                    <?php endif;
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="course_level_edit_<?= $course->id ?>" class="mb-1">سطح
                                                دوره</label>
                                            <select class="form-control" id="course_level_edit_<?= $course->id ?>">
                                                <option value="<?= $course->course_level ?>"
                                                        selected><?php switch ($course->course_level) {
                                                        case "preliminary":
                                                            echo "نقره‌ای";
                                                            break;
                                                        case "medium":
                                                            echo "طلایی";
                                                            break;
                                                        case "advanced":
                                                            echo "الماسی";
                                                            break;
                                                    } ?></option>
                                                <?php switch ($course->course_level):
                                                    case "preliminary":
                                                        ?>
                                                        <option value="medium">متوسط</option>
                                                        <option value="advanced">پیشرفته</option>
                                                        <?php break;
                                                    case "medium":
                                                        ?>
                                                        <option value="preliminary">مقدماتی</option>
                                                        <option value="advanced">پیشرفته</option>
                                                        <?php break;
                                                    case "advanced":
                                                        ?>
                                                        <option value="preliminary">مقدماتی</option>
                                                        <option value="medium">متوسط</option>
                                                        <?php break;
                                                endswitch; ?>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="course_status_edit_<?= $course->id ?>" class="mb-1">وضعیت
                                                دوره</label>
                                            <select class="form-control" id="course_status_edit_<?= $course->id ?>">
                                                <option value="<?= $course->course_status ?>"
                                                        selected><?php switch ($course->course_status) {
                                                        case "performing":
                                                            echo "در حال برگذاری";
                                                            break;
                                                        case "finished":
                                                            echo "تمام شده";
                                                            break;
                                                        case "stopped":
                                                            echo "متوقف شده";
                                                            break;
                                                    } ?></option>
                                                <?php switch ($course->course_status):
                                                    case "performing":
                                                        ?>
                                                        <option value="finished">تمام شده</option>
                                                        <option value="stopped">متوقف شده</option>
                                                        <?php break;
                                                    case "finished":
                                                        ?>
                                                        <option value="performing" selected>در حال برگذاری</option>
                                                        <option value="stopped">متوقف شده</option>
                                                        <?php break;
                                                    case "stopped":
                                                        ?>
                                                        <option value="performing" selected>در حال برگذاری</option>
                                                        <option value="finished">تمام شده</option>
                                                        <?php break;
                                                endswitch; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="course_type_edit_<?= $course->id ?>" class="mb-1">نوع
                                                دوره</label>
                                            <select class="form-control" id="course_type_edit_<?= $course->id ?>"
                                                    onchange="change_type_course('course_type_edit_<?= $course->id ?>', 'div-price_edit_<?= $course->id ?>')">
                                                <option selected
                                                        value="<?= $course->course_type ?>">
                                                    <?php switch ($course->course_type) {
                                                        case "money":
                                                            echo "نقدی";
                                                            break;
                                                        case "free":
                                                            echo "رایگان";
                                                            break;
                                                    } ?>
                                                </option>
                                                <?php switch ($course->course_type):
                                                    case "money":
                                                        ?>
                                                        <option value="free">رایگان</option>
                                                        <?php break;
                                                    case "free":
                                                        ?>
                                                        <option value="money">نقدی</option>
                                                        <?php break;
                                                endswitch; ?>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3" id="div-price_edit_<?= $course->id ?>"
                                             <?php if ($course->course_type == 'free'): ?>style="display: none"<?php endif; ?>>
                                            <label for="course_price_edit_<?= $course->id ?>" class="mb-1">قیمت
                                                (تومان)</label>
                                            <input type="tel" class="form-control"
                                                   id="course_price_edit_<?= $course->id ?>"
                                                   value="<?= $course->course_price ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="course_description_edit_<?= $course->id ?>" class="mb-1">توضحیات
                                            دوره</label>
                                        <textarea class="form-control"
                                                  id="course_description_edit_<?= $course->id ?>"><?= $course->course_description ?></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="course_video_demo_edit_<?= $course->id ?>"
                                                   class="mb-1">ویدیو</label>
                                            <input type="url" class="form-control"
                                                   id="course_video_demo_edit_<?= $course->id ?>"
                                                   placeholder="https://example.com"
                                                   value="<?= $course->course_demo_video ?>">
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="course_image_edit_<?= $course->id ?>" class="mb-1">تصویر</label>
                                            <input type="file" class="form-control"
                                                   id="course_image_edit_<?= $course->id ?>">
                                            <div id="progressShow_edit_<?= $course->id ?>" style="display: none">
                                                <div class="progress progress_load">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                         id="progressBar_edit_<?= $course->id ?>"
                                                         role="progressbar"></div>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <p id="status_edit_<?= $course->id ?>"
                                                       class="text-secondary me-2"></p>
                                                    <p id="loaded_n_total_edit_<?= $course->id ?>"
                                                       class="text-secondary"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="button" class="btn btn-success px-5 py-2"
                                                id="btn_course_edit_<?= $course->id ?>"
                                                onclick="course_edit(<?= $course->id ?>, 'btn_course_edit_<?= $course->id ?>', 'form_course_edit_<?= $course->id ?>', 'course_name_edit_<?= $course->id ?>', 'course_labels_edit_<?= $course->id ?>', 'course_category_edit_<?= $course->id ?>', 'course_level_edit_<?= $course->id ?>', 'course_status_edit_<?= $course->id ?>', 'course_type_edit_<?= $course->id ?>', 'course_price_edit_<?= $course->id ?>', 'course_description_edit_<?= $course->id ?>', 'course_video_demo_edit_<?= $course->id ?>', 'course_image_edit_<?= $course->id ?>', 'course_teacher_name_<?= $course->id ?>', 'progressShow_edit_<?= $course->id ?>', 'loaded_n_total_edit_<?= $course->id ?>', 'progressBar_edit_<?= $course->id ?>', 'status_edit_<?= $course->id ?>')">
                                            ثبت
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal show more -->
                <div class="modal fade" id="show-more-<?= $course->id ?>" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><?= $course->course_title ?></h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <img data-src="<?= DL_DOMAIN ?>/public/images/course/<?= $course->course_image ?>/<?= $course->course_image ?>"
                                     alt="<?= $course->course_title ?>" class="img-fluid lozad">
                                <div class="card my-3">
                                    <div class="card-body text-wrap text-justify">
                                        <h6 class="fw-bold"><i class="fa-solid fa-receipt text-muted me-2"></i>توضیحات
                                        </h6>
                                        <p><?= $course->course_description ?></p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body text-wrap text-justify">
                                        <h6 class="fw-bold"><i class="fa-solid fa-tags text-muted me-2"></i>برچسب ها
                                        </h6>
                                        <div class="course-tags">
                                            <?php
                                            $course_labels = explode(',', $course->course_labels);
                                            foreach ($course_labels as $course_label) { ?>
                                                <a href="#"
                                                   title="<?php echo $course_label ?>"><?php echo $course_label ?></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tom select edit id <?= $course->id ?> -->
                <script>
                    $(document).ready(() => {
                        tom_select_input('course_labels_edit_<?= $course->id ?>')
                    })
                </script>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function course_edit(id, button, form, name, labels, category, level, status, type, price, description, video_demo, image, teacher_show_name, progressShow, loaded_n_total, progressBar, status_progress) {
        // form and btn
        var btn_course = $("#" + button + "")
        var form_course = $("#" + form + " input, #" + form + " select, #" + form + " textarea")
        // var
        var course_name = $("#" + name + "").val().trim()
        var course_labels = $("#" + labels + "").val().trim()
        var course_category = $("#" + category + "").val()
        var course_level = $("#" + level + "").val()
        var course_status = $("#" + status + "").val()
        var course_type = $("#" + type + "").val()
        var course_price = $("#" + price + "").val().trim()
        var course_description = $("#" + description + "").val().trim()
        var course_demo_video_type = 'external_video'
        var course_video_demo = $("#" + video_demo + "").val().trim()
        var course_image = $("#" + image + "").prop('files')[0]
        var teacher_name = $("#" + teacher_show_name + "")
        if (!empty(course_name) && !empty(course_category) && !empty(course_labels) && !empty(course_level) && !empty(course_status) && !empty(course_type) && !empty(course_description) && !empty(course_video_demo)) {
            // form data and append
            var for_data = new FormData()
            for_data.append('course_name', course_name)
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
            for_data.append('id', id)
            // disable btn and form
            btn_course.prop('disabled', true).text('در حال بررسی...').addClass('disabled pointer-events btn_success_dot-flashing')
            form_course.prop('disabled', true)
            $.ajax({
                url: PATH + "/admin_courses/edit",
                type: "POST",
                data: for_data,
                contentType: false,
                cache: false,
                processData: false,
                success: (data) => {
                    let obj = JSON.parse(data)
                    let message = obj.data.message
                    let status_code = obj.statusCode
                    switch (status_code) {
                        case 200:
                            if (!obj.data.img_upload) {
                                alert_success(message)
                                setTimeout(() => location.reload(), 3000)
                            } else {
                                alert_success(message, 'success', 1400)
                                uploadFile_ajax(course_image, obj.data.img_name, 'course_image', progressShow, loaded_n_total, progressBar, status_progress)
                                setTimeout(() => alert_success("<?= warnings['file_uploading'] ?>", 'warning'), 1500)
                            }
                            break;
                        case 500:
                            alert_error(message)
                            btn_course.prop('disabled', false).text('ثبت').removeClass('disabled pointer-events btn_success_dot-flashing')
                            form_course.prop('disabled', false)
                            teacher_name.prop('disabled', true) // after enabled all input in disabled
                            break;
                    }
                },
                error: () => {
                    alert_error('خطا در اضافه کردن دوره')
                    btn_course.prop('disabled', false).text('ثبت').removeClass('disabled pointer-events btn_success_dot-flashing')
                    form_course.prop('disabled', false)
                    teacher_name.prop('disabled', true) // after enabled all input in disabled
                },
            })
        } else {
            if (empty(course_name)) alert_error('فیلد نام دوره اجباری است')
            if (empty(course_labels)) alert_error('برچسب دوره اجباری است')
            if (empty(course_category)) alert_error('دسته بندی دوره اجباری است')
            if (empty(course_level)) alert_error('فیلد سطح دوره اجباری است')
            if (empty(course_status)) alert_error('فیلد وضعیت دوره اجباری است')
            if (empty(course_type)) alert_error('نوع دوره اجباری است')
            if (empty(course_description)) alert_error('فیلد توضیحات دوره اجباری است')
            if (empty(course_video_demo)) alert_error('فیلد ویدئو دوره اجباری است')
        }
    }
</script>