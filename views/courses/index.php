<main>
    <div class="container-fluid py-5">
        <div class="container">
            <h5 class="fw-bold pb-4">دوره های آموزشی مایندباکس</h5>
            <div class="row">
                <!-- filter -->
                <div class="col-12 col-lg-4 col-xl-3">
                    <div class="row align-items-center">
                        <!-- type -->
                        <div class="col-12 col-sm-6 col-lg-12 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-header bg-white">
                                    <span class="fw-bold">فیلتر بر اساس نوع</span>
                                </div>
                                <div class="card-body text-center">
                                    <div class="btn-group btn-group-orange">
                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" checked>
                                        <label class="shadow-none" for="btnradio1">همه</label>
                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2">
                                        <label class="shadow-none label-center" for="btnradio2">خریدنی</label>
                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3">
                                        <label class="shadow-none" for="btnradio3">رایگان</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- sort -->
                        <div class="col-12 col-sm-6 col-lg-12 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-header bg-white">
                                    <span class="fw-bold">مرتب سازی بر اساس</span>
                                </div>
                                <div class="card-body border-form">
                                    <select class="form-control">
                                        <option>جدیدترین</option>
                                        <option>قیمت</option>
                                        <option>محبوبیت</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- discounted -->
                        <div class="col-12 col-sm-6 col-lg-12 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input shadow-none form-check-input-orange"
                                               type="checkbox">
                                        <label class="form-check-label">فقط محصولات تخفیف دار</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- level -->
                        <div class="col-12 col-sm-6 col-lg-12 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-header bg-white">
                                    <span class="fw-bold">فیلتر بر اساس سطح</span>
                                </div>
                                <div class="card-body border-form">
                                    <select class="form-control">
                                        <option>همه</option>
                                        <option>مقدماتی</option>
                                        <option>متوسط</option>
                                        <option>پیشرفته</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- courses -->
                <div class="col-12 col-lg-8 col-xl-9">
                    <div class="row">
                        <?php foreach ($data['courses'] as $course) { ?>
                            <!-- course -->
                            <div class="col-12 col-sm-6 col-lg-6 col-xl-4 mb-4">
                                <div class="card border-0 course-card h-100">
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
                    <!-- pagination -->
                    <div class="pagination-layer text-center pt-3">
                        <a href="#" class="page pagination-active">1</a>
                        <a href="#" class="page">2</a>
                        <a href="#" class="page">3</a>
                        <a href="#" class="page">4</a>
                        <a href="#" class="page">5</a>
                        <a href="#" class="page"><i class="fas fa-chevron-left text-muted"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>