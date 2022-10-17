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
    <?php if (is_array($data['benefits']) && !empty($data['benefits'])) { ?>
        <div class="container-fluid bg-anti-flash-white py-5">
            <div class="container">
                <!-- title -->
                <h3 class="fw-bold text-center">مزایای دوره های مایندباکس</h3>
                <div class="row py-4">
                    <?php foreach ($data['benefits'] as $benefit) {
                        $benefit = json_decode($benefit->information_data); ?>
                        <!-- section -->
                        <div class="col-12 col-md-6 mb-4">
                            <div class="d-flex align-items-center">
                                <span class="benefits-icon"><i class="<?= $benefit->icon ?>"></i></span>
                                <div class="ms-3">
                                    <h5 class="fw-bold"><?= $benefit->title ?></h5>
                                    <p class="text-muted"><?= $benefit->description ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
</main>