<!-- the last courses -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="d-flex justify-content-between pb-4">
            <h4 class="fw-bold">آخرین دوره ها</h4>
            <a href="<?php echo DOMAIN ?>/courses" class="text-orange">مشاهده بیشتر</a>
        </div>
        <div class="row">
            <?php foreach ($data['course_last'] as $course_last) { ?>
                <!-- course -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                    <div class="card course-card h-100">
                        <a href="<?php echo DOMAIN ?>/courses/course_details/<?php echo $course_last->id ?>"><img
                                    data-src="<?php echo DOMAIN ?>/public/images/<?php echo $course_last->course_image ?>"
                                    alt="<?php echo $course_last->course_title ?>" data-alt="<?php echo $course_last->course_title ?>"
                                    class="card-img-top lozad"></a>
                        <div class="card-body">
                            <h2 class="title-course-card text-truncate mb-3">
                                <a href="<?php echo DOMAIN ?>/courses/course_details/<?php echo $course_last->id ?>"><?php echo $course_last->course_title ?></a>
                            </h2>
                            <div class="d-flex justify-content-between">
                            <span class="user-course-card text-muted"><i
                                        class="fa-solid fa-user me-1"></i><?php echo $course_last->course_teacher ?></span>
                                <?php if ($course_last->course_discount != null) { ?>
                                    <span class="fw-bold badge bg-danger">٪<?php echo $course_last->course_discount ?> تخفیف</span>
                                <?php } ?>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-3">
                                <?php
                                switch ($course_last->course_type) {
                                    case 'money':
                                        ?>
                                        <?php if ($course_last->course_discount != null) { ?>
                                        <span class="text-success"><?php echo number_format($course_last->course_price - ($course_last->course_price * $course_last->course_discount / 100)) ?> تومان</span>
                                        <span class="text-danger text-decoration-line-through"><?php echo number_format($course_last->course_price) ?><i
                                                    class="fa-solid fa-dollar-sign ms-1"></i></span>
                                    <?php } else { ?>
                                        <span class="text-success"><?php echo number_format($course_last->course_price) ?> تومان</span>
                                    <?php } ?>
                                        <?php
                                        break;
                                    case 'free':
                                        ?>
                                        <span class="text-success">رایگان</span>
                                        <?php
                                        break;
                                        ?><?php
                                }
                                ?>
                            </div>
                            <div class="d-grid">
                                <a href="<?php echo DOMAIN ?>/courses/course_details/<?php echo $course_last->id ?>"
                                   class="btn-blue">جزئیات دوره</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>