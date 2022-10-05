<?php if (is_array($data['course_discounts']) || is_object($data['course_discounts'])) { ?>
    <!-- discounts courses -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="d-flex justify-content-between pb-4">
                <h4 class="fw-bold">تخفیف های روزانه</h4>
                <a href="<?php echo DOMAIN ?>/courses" class="text-orange">مشاهده بیشتر</a>
            </div>
            <div class="owl-carousel owl-theme" id="daily-discounts">
                <?php foreach ($data['course_discounts'] as $course_discounts) { ?>
                    <!-- course -->
                    <div class="item">
                        <div class="card course-card h-100">
                            <a href="<?php echo DOMAIN ?>/courses/course_details/<?php echo $course_discounts->id ?>"><img
                                        data-src="<?php echo DOMAIN ?>/public/images/course/<?php echo $course_discounts->course_image . '/' . $course_discounts->course_image ?>"
                                        alt="<?php echo $course_discounts->course_title ?>" data-alt="<?php echo $course_discounts->course_title ?>"
                                        class="card-img-top owl-lazy"></a>
                            <div class="card-body">
                                <h2 class="title-course-card text-truncate mb-3">
                                    <a href="<?php echo DOMAIN ?>/courses/course_details/<?php echo $course_discounts->id ?>"><?php echo $course_discounts->course_title ?></a>
                                </h2>
                                <div class="d-flex justify-content-between">
                            <span class="user-course-card text-muted"><i
                                        class="fa-solid fa-user me-1"></i><?php echo $course_discounts->course_teacher ?></span>
                                    <?php if ($course_discounts->course_discount != null) { ?>
                                        <span class="fw-bold badge bg-danger">٪<?php echo $course_discounts->course_discount ?> تخفیف</span>
                                    <?php } ?>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <?php
                                    switch ($course_discounts->course_type) {
                                        case 'money':
                                            ?>
                                            <?php if ($course_discounts->course_discount != null) { ?>
                                            <span class="text-success"><?php echo number_format($course_discounts->course_price - ($course_discounts->course_price * $course_discounts->course_discount / 100)) ?> تومان</span>
                                            <span class="text-danger text-decoration-line-through"><?php echo number_format($course_discounts->course_price) ?><i
                                                        class="fa-solid fa-dollar-sign ms-1"></i></span>
                                        <?php } else {
                                            ?>
                                            <span class="text-success"><?php echo number_format($course_discounts->course_price) ?> تومان</span>
                                            <?php
                                        }
                                            break;
                                        case 'free':
                                            ?>
                                            <span class="text-success">رایگان</span>
                                            <?php
                                            break;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>