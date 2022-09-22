<main>
    <?php if (!empty($data['about_me'])) {
        $about_me = json_decode($data['about_me']->information_data) ?>
        <!-- about us -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="card shadow p-4">
                    <div class="card-body">
                        <!-- title -->
                        <h2 class="fw-bold pb-3"><?= $about_me->title ?></h2>
                        <!-- text -->
                        <p class="text-about"><?= $about_me->description ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- benefits -->
    <div class="container-fluid bg-anti-flash-white py-5">
        <div class="container">
            <!-- title -->
            <h3 class="fw-bold text-center">مزایای دوره های مایندباکس</h3>
            <div class="row py-4">
                <!-- section -->
                <div class="col-12 col-md-6 mb-4">
                    <div class="d-flex align-items-center">
                        <span class="benefits-icon"><i class="fa-solid fa-chalkboard-user"></i></span>
                        <div class="ms-3">
                            <h5 class="fw-bold">اساتید</h5>
                            <p class="text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با
                                استفاده از
                                طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                                است.</p>
                        </div>
                    </div>
                </div>
                <!-- section -->
                <div class="col-12 col-md-6 mb-4">
                    <div class="d-flex align-items-center">
                        <span class="benefits-icon"><i class="fa-solid fa-gears"></i></span>
                        <div class="ms-3">
                            <h5 class="fw-bold">فنی و محصول</h5>
                            <p class="text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با
                                استفاده از
                                طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                                است.</p>
                        </div>
                    </div>
                </div>
                <!-- section -->
                <div class="col-12 col-md-6 mb-4 mb-md-0">
                    <div class="d-flex align-items-center">
                        <span class="benefits-icon"><i class="fa-solid fa-headphones"></i></span>
                        <div class="ms-3">
                            <h5 class="fw-bold">پشیبانی</h5>
                            <p class="text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با
                                استفاده از
                                طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                                است.</p>
                        </div>
                    </div>
                </div>
                <!-- section -->
                <div class="col-12 col-md-6 mb-4 mb-md-0">
                    <div class="d-flex align-items-center">
                        <span class="benefits-icon"><i class="fa-solid fa-people-group"></i></span>
                        <div class="ms-3">
                            <h5 class="fw-bold">تیم</h5>
                            <p class="text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با
                                استفاده از
                                طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                                است.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>