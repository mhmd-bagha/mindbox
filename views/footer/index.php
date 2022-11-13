<?php
$social_networks = (new Model())->where_all('social_networks', 'status_show', 'show');
$get_footer = (new Model())->where('information', 'information_type', 'footer');
if ($get_footer):
    $footer = json_decode($get_footer->information_data); ?>
    <style>
        .bg-footer_custom {
            background-color: <?= $footer->color ?> !important;
        }
    </style>
<?php endif; ?>
<div class="container-fluid bg-footer<?= ($get_footer) ? ' bg-footer_custom' : ''; ?> py-5">
    <div class="row align-items-center text-center mb-3">
        <!-- logo -->
        <div class="col-12 col-md-4 col-xl-6 col-xxl-4 order-1 order-md-1 order-xxl-0 mb-4 mb-md-0">
            <a href="index.php"><img
                        src="<?php echo DL_DOMAIN ?>/public/images/public-images/logo/logo-footer.png/logo-footer.png"
                        alt="" class="img-fluid"></a>
        </div>
        <!-- about -->
        <div class="col-12 col-md-12 col-xl-12 col-xxl-4 order-0 order-md-0 order-xxl-1 mb-4 mb-md-5 mb-xxl-0  text-justify">
            <div class="d-flex justify-content-between align-items-baseline pb-4">
                <h5 class="fw-bold text-white"><?= $get_footer ? $footer->title : ''; ?></h5>
                <a onclick="backTop()" class="btn-white d-xxl-none">برگشت به بالا<i
                            class="fa-solid fa-angle-up ms-3 mt-1"></i></a>
            </div>
            <?= $get_footer ? $footer->description : ''; ?>
        </div>
        <!-- images -->
        <div class="col-12 col-md-8 col-xl-6 col-xxl-4 order-2 order-md-2 order-xxl-2 mb-4 mb-md-0">
            <div class="row">
                <?php if ($get_footer && !empty($footer->symbols)): foreach ($footer->symbols as $symbol): ?>
                    <div class="col-12 col-sm-4 text-sm-end mb-2">
                        <a href="#">
                            <img src="<?php echo DL_DOMAIN ?>/public/images/public-images/logo-symbol/<?= $symbol ?>/<?= $symbol ?>"
                                 alt="نماد" class="bg-white rounded p-2" width="120" height="120"></a>
                    </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </div>
    <!-- social networks -->
    <div class="social-networks text-center">
        <?php foreach ($social_networks as $social_network) { ?>
            <a href="<?= $social_network->network_address ?>" title="<?= $social_network->network_name ?>" target="_blank"><i
                        class="<?= $social_network->network_icon ?>"></i></a>
        <?php } ?>
    </div>
</div>
<div class="container-fluid text-center py-4">
    <span>تمامی حقوق مادی و معنوی این سایت متعلق به مایندباکس می باشد و هرگونه کپی برداری غیرقانونی محسوب خواهد شد.</span>
</div>