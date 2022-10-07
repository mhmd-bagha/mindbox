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
                            <a data-bs-toggle="modal" data-bs-target="#form"
                               class="btn btn-sm btn-outline-primary shadow-none"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
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