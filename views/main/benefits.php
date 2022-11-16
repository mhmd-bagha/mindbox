<?php $benefits = $data['benefits']; if (is_array($benefits) || is_object($benefits) && !empty($benefits)) { ?>
    <div class="container-fluid bg-anti-flash-white py-5">
        <div class="container">
            <!-- title -->
            <h3 class="fw-bold text-center">مزایای دوره های <?= SITE_NAME_FA ?></h3>
            <div class="row py-4">
                <?php foreach ($benefits as $benefit) {
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