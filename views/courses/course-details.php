<?php $course_details = $data['course_details'][0]; ?>
<main>
    <div class="container-fluid py-5">
        <div class="container">
            <!-- course title  -->
            <h2 class="fw-bold text-truncate pb-4"><?php echo $course_details->course_title ?></h2>
            <div class="row">
                <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                    <!-- course status -->
                    <div class="card border-0 box-shadow-sm mb-4">
                        <div class="card-body">
                            <div class="course">
                                <span class="right"><?php switch ($course_details->course_status) {
                                        case 'performing':
                                            echo 'در حال برگزاری';
                                            break;
                                        case 'finished':
                                            echo 'تمام شده';
                                            break;
                                        case 'stopped':
                                            echo 'حذف شده';
                                            break;
                                    } ?></span>
                                <span class="left"><?php switch ($course_details->course_level) {
                                        case 'preliminary':
                                            echo 'مبتدی';
                                            break;
                                        case 'medium':
                                            echo 'متوسط';
                                            break;
                                        case 'advanced':
                                            echo 'پیشرفته';
                                            break;
                                    } ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- course information -->
                    <div class="card border-0 py-3 px-2 px-sm-3 box-shadow-sm mb-4">
                        <div class="card-body">
                            <div class="d-block d-sm-flex d-lg-block d-xxl-flex text-center text-sm-start text-lg-center text-xxl-start">
                                <h6 class="text-muted"><i class="fa-solid fa-dollar-sign text-success me-1"></i>قیمت این
                                    دوره:</h6>
                                <?php switch ($course_details->course_type) {
                                    case 'money':
                                        ?>
                                        <?php if ($course_details->course_discount != null) { ?>
                                        <h5 class="fw-bold text-decoration-line-through text-danger mx-3"><?php echo number_format($course_details->course_price) ?></h5>
                                        <h5 class="fw-bold text-success"><?php echo number_format($course_details->course_price / $course_details->course_discount) ?>
                                            تومان</h5>
                                    <?php } else { ?>
                                        <h5 class="fw-bold text-success mx-1"><?php echo number_format($course_details->course_price) ?>
                                            تومان</h5>
                                    <?php } ?>
                                        <?php break;
                                    case 'free':
                                        ?>
                                        <h5 class="fw-bold text-success mx-1">رایگان</h5>
                                        <?php break;
                                } ?>
                            </div>
                            <hr>
                            <ul class="list-unstyled">
                                <li class="pb-3 text-truncate">
                                <span class="text-muted"><i
                                            class="fa-solid fa-user text-blue me-3"></i>مدرس دوره:</span>
                                    <span><?php echo $course_details->course_teacher ?></span>
                                </li>
                                <li class="pb-3 text-truncate">
                                <span class="text-muted"><i
                                            class="fa-solid fa-video text-blue me-3"></i>تعداد جلسات:</span>
                                    <span><?php echo $data['count_course_files'] ?></span>
                                </li>
                                <li class="pb-3 text-truncate">
                                    <span class="text-muted"><i class="fa-solid fa-clock text-blue me-3"></i>مدت زمان دوره:</span>
                                    <span><?php echo($data['get_time_all_course']) ?></span>
                                </li>
                                <?php if ($course_details->update_time != null) { ?>
                                    <li class="pb-3 text-truncate">
                                        <span class="text-muted"><i class="fa-solid fa-calendar-day text-blue me-3"></i>تاریخ آخرین بروزرسانی:</span>
                                        <span><?php echo $course_details->update_time ?></span>
                                    </li>
                                <?php } ?>
                            </ul>
                            <hr>
                            <div class="d-grid">
                                <a href="#" class="btn-blue">ثبت نام در دوره</a>
                            </div>
                        </div>
                    </div>
                    <!-- social network -->
                    <div class="card border-0 py-3 px-2 px-sm-3 box-shadow-sm mb-4">
                        <div class="card-body">
                            <div class="d-block d-sm-flex d-lg-block d-xl-flex justify-content-between">
                                <span class="d-block pb-3 pb-sm-0 pb-lg-3 pb-xl-0 text-nowrap">شبکه های اجتماعی</span>
                                <div class="social-networks text-end ps-4 ps-lg-0 ps-xl-4">
                                    <a href="#" title="Youtube"><i class="fa-brands fa-youtube"></i></a>
                                    <a href="#" title="Telegram"><i class="fa-brands fa-telegram"></i></a>
                                    <a href="#" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- course tags -->
                    <div class="card border-0 py-3 px-2 px-sm-3 box-shadow-sm mb-4">
                        <div class="card-body">
                            <span><i class="fa-solid fa-tags text-muted me-2"></i>برچسب ها:</span>
                            <hr>
                            <div class="course-tags">
                                <?php
                                $course_labels = explode(',', $course_details->course_labels);
                                foreach ($course_labels as $course_label) { ?>
                                    <a href="#" title="<?php echo $course_label ?>"><?php echo $course_label ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <!-- demo -->
                    <div class="ltr mb-5">
                        <video id="video-player">
                            <?php switch ($course_details->course_demo_video_type) {
                                case 'external_video':
                                    ?>
                                    <source src="<?php echo $course_details->course_demo_video ?>" type="video/mp4"/>
                                    <?php
                                    break;
                                case 'internal_video':
                                    ?>
                                    <source src="<?php echo DL_DOMAIN . '/' . $course_details->course_demo_video ?>"
                                            type="video/mp4"/>
                                    <?php
                                    break;
                            } ?>
                        </video>
                    </div>
                    <!-- description -->
                    <div class="card rounded-3 border-0 box-shadow mb-5">
                        <div class="card-body content-description hide-content">
                            <!-- course title -->
                            <h5 class="fw-bold text-truncate text-blue">
                                دوره <?php echo $course_details->course_title ?></h5>
                            <hr>
                            <!-- course image -->
                            <img src="<?php echo DOMAIN ?>/public/images/<?php echo $course_details->course_image ?>"
                                 alt="" class="card-img-top">
                            <!-- course description -->
                            <div class="course-description py-4"><?php echo $course_details->course_description ?></div>
                            <!-- button show more -->
                            <div class="show-more" id="content-description">
                                <button class="btn btn-blue mb-1"
                                        onclick="ShowMore('content-description','content-description')"><i
                                            class="fa-solid fa-angle-down me-2"></i>نمایش بیشتر
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php require 'course_files.php' ?>
                    <?php require 'comment.php' ?>
                </div>
            </div>
        </div>
    </div>
</main>