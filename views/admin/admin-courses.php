<div class="container-fluid">
    <!-- sidebar -->
    <?php
    require_once("admin-menu.php");
    ?>
    <!-- content wrapper -->
    <section class="content-wrapper">
        <!-- header content -->
        <?php
        require_once("admin-header.php");
        ?>
        <!-- main content -->
        <section class="main-content px-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5>دوره ها</h5>
                <a data-bs-toggle="modal" data-bs-target="#form" class="btn btn-primary"><i
                            class="fa-solid fa-plus me-2"></i>ایجاد کردن</a>
            </div>
            <hr>
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
                                <td><?php switch ($course->course_price){
                                        case !null: echo $course->course_price;break;
                                        case null: echo "بدون قیمت";break;
                                    }?></td>
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
                                            echo "مقدماتی";
                                            break;
                                        case "medium":
                                            echo "متوسط";
                                            break;
                                        case "advanced":
                                            echo "پیشرفته";
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
<!--                                        <a href="#" title="غیرفعال"-->
<!--                                           class="btn btn-sm btn-outline-secondary shadow-none"><i-->
<!--                                                    class="fa-solid fa-toggle-off"></i></a>-->
                                        <a href="<?= DOMAIN ?>/admin/course_part/<?= $course->id ?>" target="_blank" title="فایل ها"
                                           class="btn btn-sm btn-outline-dark shadow-none"><i
                                                    class="fa-solid fa-list-check"></i></a>
                                        <a data-bs-toggle="modal" data-bs-target="#form"
                                           class="btn btn-sm btn-outline-primary shadow-none"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i
                                                    class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <!-- modal show more -->
                            <div class="modal fade" id="show-more-<?= $course->id ?>" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><?= $course->course_title ?></h5>
                                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img data-src="<?= DOMAIN ?>/public/images/<?= $course->course_image ?>"
                                                 alt="<?= $course->course_title ?>" class="img-fluid lozad">
                                            <div class="card my-3">
                                                <div class="card-body text-wrap text-justify">
                                                    <h6 class="fw-bold"><i class="fa-solid fa-receipt text-muted me-2"></i>توضیحات</h6>
                                                    <p><?= $course->course_description ?></p>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body text-wrap text-justify">
                                                    <h6 class="fw-bold"><i class="fa-solid fa-tags text-muted me-2"></i>برچسب ها</h6>
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
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- modal edit & add -->
            <div class="modal fade" id="form" tabindex="-1">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">دوره</h5>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-start">
                            <form action="" method="" class="border-form">
                                <div class="row">
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="" class="mb-1">نام دوره</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="" class="mb-1">مدرس دوره</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="" class="mb-1">برچسب های دوره</label>
                                        <input id="select_lables">
                                        <small>حداکثر تعداد برچسب ها 23 تا می باشد.</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="" class="mb-1">دسته بندی دوره</label>
                                        <select class="form-control">
                                            <option disabled selected>انتخاب کنید...</option>
                                            <option>دسته بندی اول</option>
                                            <option>دسته بندی دوم</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="" class="mb-1">سطح دوره</label>
                                        <select class="form-control">
                                            <option disabled selected>انتخاب کنید...</option>
                                            <option>مقدماتی</option>
                                            <option>متوسط</option>
                                            <option>پیشرفته</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="" class="mb-1">وضعیت دوره</label>
                                        <select class="form-control">
                                            <option disabled selected>انتخاب کنید...</option>
                                            <option>در حال برگذاری</option>
                                            <option>به اتمام رسیده</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="" class="mb-1">نوع دوره</label>
                                        <select class="form-control" id="type-course">
                                            <option disabled selected value="">انتخاب کنید...</option>
                                            <option value="money">نقدی</option>
                                            <option value="free">رایگان</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3" id="div-price">
                                        <label for="" class="mb-1">قیمت (تومان)</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="mb-1">توضحیات دوره</label>
                                    <textarea class="form-control" id="description"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="" class="mb-1">ویدیو</label>
                                        <input type="file" class="form-control">
                                        <div class="progress mt-2">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                 role="progressbar" style="width: 50%;">50%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="" class="mb-1">تصویر</label>
                                        <input type="file" class="form-control">
                                        <div class="progress mt-2">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                 role="progressbar" style="width: 50%;">50%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success">ثبت</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</div>
<!-- admin backdrop -->
<div class="admin-backdrop"></div>

<!-- script -->
<script>
    // ckeditor
    CKEDITOR.replace('description', {
        language: 'fa'
    });
</script>