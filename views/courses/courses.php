<?php $courses = $data['courses']; ?>
<div class="row">
    <?php foreach (paginate($courses, 1) as $course) { ?>
        <!-- course -->
        <div class="col-12 col-sm-6 col-lg-6 col-xl-4 mb-4">
            <div class="card border-0 course-card h-100 shadow-sm">
                <a href="<?php echo DOMAIN ?>/courses/course_details/<?php echo $course->id ?>">
                    <img data-src="<?php echo DOMAIN ?>/public/images/<?php echo $course->course_image ?>" alt="<?php echo $course->course_title ?>" data-alt="<?php echo $course->course_title ?>" class="card-img-top rounded-0 lozad"></a>
                <div class="card-body">
                    <h2 class="title-course-card text-truncate mb-3">
                        <a href="<?php echo DOMAIN ?>/courses/course_details/<?php echo $course->id ?>"><?php echo $course->course_title ?></a>
                    </h2>
                    <div class="d-flex justify-content-between">
                            <span class="user-course-card text-muted"><i
                                    class="fa-solid fa-user me-1"></i><?php echo $course->course_teacher ?></span>
                        <?php if ($course->course_discount != null) { ?>
                            <span class="fw-bold badge bg-danger">٪<?php echo $course->course_discount ?> تخفیف</span>
                        <?php } ?>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <?php
                        switch ($course->course_type) {
                            case 'money':
                                ?>
                                <?php if ($course->course_discount != null) { ?>
                                <span class="text-success"><?php echo number_format($course->course_price - ($course->course_price * $course->course_discount / 100)) ?> تومان</span>
                                <span class="text-danger text-decoration-line-through"><?php echo number_format($course->course_price) ?><i
                                        class="fa-solid fa-dollar-sign ms-1"></i></span>
                            <?php } else { ?>
                                <span class="text-success"><?php echo number_format($course->course_price) ?> تومان</span>
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
                        <a href="<?php echo DOMAIN ?>/courses/course_details/<?php echo $course->id ?>"
                           class="btn-blue">جزئیات دوره</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>