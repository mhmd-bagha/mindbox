<?php $my_courses = $data['my_courses']; ?>
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
                            <h5>دوره های من</h5>
                            <hr>
                            <?php if (!empty($my_courses)): ?>
                                <div class="table-responsive overflow-y-auto">
                                    <!-- table -->
                                    <table class="table table-striped table-hover table-bordered text-center text-nowrap">
                                        <thead class="table-dark sticky-top">
                                        <tr>
                                            <th>عنوان آموزش</th>
                                            <th>تاریخ آخرین بروزرسانی</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($my_courses as $my_course) {
                                            $my_course = $my_course[0]; ?>
                                            <tr>
                                                <td><a href="<?= DOMAIN ?>/courses/course_details/<?= $my_course->id ?>" class="text-blue"><?= $my_course->course_title ?></a>
                                                </td>
                                                <td><?php switch ($my_course->update_time) {
                                                        case null:
                                                            echo $my_course->create_time;
                                                            break;
                                                        case !null:
                                                            echo $my_course->update_time;
                                                            break;
                                                    } ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else: Model::alert_null_data('دوره ای خریداری نشده', 'alert-primary fs-6 text-center'); endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>