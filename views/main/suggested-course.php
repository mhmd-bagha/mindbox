<?php if (is_array($data['course_offer']) || is_object($data['course_offer'])) { ?>
    <!-- suggested courses -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="d-flex justify-content-between pb-4">
                <h4 class="fw-bold">دوره های پیشنهادی</h4>
            </div>
            <div class="owl-carousel owl-theme" id="suggested-courses">
                <?php foreach ($data['course_offer'] as $course_offer) { ?>
                    <!-- course -->
                    <div class="item">
                        <div class="card course-card h-100">
                            <a href="<?php echo DOMAIN ?>/courses/course_details/<?php echo $course_offer->id ?>"><img
                                        src="<?php echo DOMAIN ?>/public/images/<?php echo $course_offer->course_image ?>"
                                        alt="<?php echo $course_offer->course_title ?>"
                                        class="card-img-top"></a>
                            <div class="card-body">
                                <h2 class="title-course-card text-truncate mb-3">
                                    <a href="<?php echo DOMAIN ?>/courses/course_details/<?php echo $course_offer->id ?>"><?php echo $course_offer->course_title ?></a>
                                </h2>
                                <div class="d-flex justify-content-between">
                            <span class="user-course-card text-muted"><i
                                        class="fa-solid fa-user me-1"></i><?php echo $course_offer->course_teacher ?></span>
                                    <?php if ($course_offer->course_discount != null){ ?>
                                        <span class="fw-bold badge bg-danger">٪<?php echo $course_offer->course_discount ?> تخفیف</span>
                                    <?php } ?>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <?php
                                    switch ($course_offer->course_type) {
                                        case 'money':
                                            ?>
                                            <?php if ($course_offer->course_discount != null) { ?>
                                            <span class="text-success"><?php echo number_format(($course_offer->course_price / $course_offer->course_discount)) ?> تومان</span>
                                            <span class="text-danger text-decoration-line-through"><?php echo number_format($course_offer->course_price) ?><i
                                                        class="fa-solid fa-dollar-sign ms-1"></i></span>
                                        <?php } else {
                                            ?>
                                            <span class="text-success"><?php echo number_format($course_offer->course_price) ?> تومان</span>
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