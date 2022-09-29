<!-- main -->
<main>
    <div class="container-fluid py-5">
        <div class="container">
            <div class="card border-0 rounded-0 box-shadow-sm">
                <div class="card-body p-0">
                    <div class="row mx-0">
                        <div class="col-12 col-lg-3 user-menu">
                            <!-- user menu -->
                            <?php
                            require_once("user-menu.php");
                            ?>
                        </div>
                        <div class="col-12 col-lg-9 user-content">
                            <h5>فاکتور ها</h5>
                            <hr>
                            <div class="table-responsive overflow-y-auto">
                                <!-- table -->
                                <table class="table table-striped table-hover table-bordered text-center text-nowrap">
                                    <thead class="table-dark sticky-top">
                                    <tr>
                                        <th>تاریخ</th>
                                        <th>تعداد دوره</th>
                                        <th>وضعیت پرداخت</th>
                                        <th>جزئیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($data['my_factors'] as $my_factor) {
                                        $my_courses_id = explode(',', $my_factor->courses_id);
                                        $count_courses = count($my_courses_id); ?>
                                        <tr>
                                            <td><?= $my_factor->create_time ?></td>
                                            <td><?= $count_courses; ?></td>
                                            <td><?php switch ($my_factor->factor_status) {
                                                    case "paid":
                                                        ?>
                                                        <span class="text-success">پرداخت موفق</span>
                                                        <?php break;
                                                    case "unsuccessful": ?>
                                                        <span class="text-danger">پرداخت ناموفق</span>
                                                        <?php break;
                                                    case "waiting": ?>
                                                        <span class="text-warning">پرداخت معلق</span>
                                                        <?php break;
                                                } ?></td>
                                            <td><a class="btn btn-sm shadow-none btn-outline-secondary"
                                                   data-bs-toggle="modal"
                                                   data-bs-target="#factor_details_<?= $my_factor->id ?>">جزئیات</a>
                                            </td>
                                        </tr>
                                        <!-- modal factor details -->
                                        <div class="modal fade" id="factor_details_<?= $my_factor->id ?>"
                                             tabindex="-1">
                                            <div class="modal-dialog modal-fullscreen-sm-down modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">جزئیات فاکتور</h5>
                                                        <button type="button" class="btn-close shadow-none"
                                                                data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php foreach ($my_courses_id as $my_course_id) {
                                                            $my_course = $this->model->where('courses', 'id', $my_course_id); ?>
                                                            <div class="row factor-details">
                                                                <div class="col-12 col-sm-6 mb-4 mb-sm-0">
                                                                    <a href="<?= DOMAIN . "/courses/course_details/{$my_course->id}" ?>" target="_blank"><img
                                                                                src="<?= DOMAIN . '/public/images/course/' . $my_course->course_image . '/' . $my_course->course_image ?>"
                                                                                alt="<?= $my_course->course_title ?>"
                                                                                class="img-fluid lozad"></a>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <span><a href="<?= DOMAIN . "/courses/course_details/{$my_course->id}" ?>" target="_blank"><?= $my_course->course_title ?></a></span>
                                                                    <span class="text-truncate"><?= $my_course->course_description ?></span>
                                                                    <span>مبلغ دوره: <?php if ($my_factor->factor_type == 'free' && empty($my_factor->factor_price)) {
                                                                        echo "رایگان";
                                                                        } else {
                                                                            echo number_format($my_course->course_price) . ' تومان';
                                                                        } ?></span>
                                                                    <span>قابل پرداخت: <?php if ($my_factor->factor_type == 'free' && empty($my_factor->factor_price)) {
                                                                            echo "رایگان";
                                                                        } else {
                                                                            echo number_format($my_factor->factor_price) . ' تومان';
                                                                        } ?></span>
                                                                </div>
                                                                <div class="text-end">
                                                                    <a href="<?= DOMAIN . "/courses/course_details/{$my_course->id}#comment" ?>"
                                                                       class="text-info">ثبت دیدگاه</a>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
