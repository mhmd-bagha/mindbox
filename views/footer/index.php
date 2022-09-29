<?php $social_networks = (new Model())->where_all('social_networks', 'status_show', 'show') ?>
<div class="container-fluid bg-footer py-5">
    <div class="row align-items-center text-center mb-3">
        <!-- logo -->
        <div class="col-12 col-md-4 col-xl-6 col-xxl-4 order-1 order-md-1 order-xxl-0 mb-4 mb-md-0">
            <a href="index.php"><img src="<?php echo DOMAIN ?>/public/images/public-images/logo/logo-footer.png" alt=""
                                     class="img-fluid"></a>
        </div>
        <!-- about -->
        <div class="col-12 col-md-12 col-xl-12 col-xxl-4 order-0 order-md-0 order-xxl-1 mb-4 mb-md-5 mb-xxl-0  text-justify">
            <div class="d-flex justify-content-between align-items-baseline pb-4">
                <h5 class="fw-bold text-white">مایندباکس</h5>
                <a onclick="backTop()" class="btn-white d-xxl-none">برگشت به بالا<i
                            class="fa-solid fa-angle-up ms-3 mt-1"></i></a>
            </div>
            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون
            بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع
            با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه
            و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و
            فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها،
            و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل
            دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
        </div>
        <!-- images -->
        <div class="col-12 col-md-8 col-xl-6 col-xxl-4 order-2 order-md-2 order-xxl-2 mb-4 mb-md-0">
            <div class="row">
                <div class="col-12 col-sm-4 text-sm-end mb-2">
                    <a href="#"><img
                                src="<?php echo DOMAIN ?>/public/images/public-images/logo-namad/logo-samandehi.png"
                                alt="" class="bg-white rounded p-2" width="120" height="130"></a>
                </div>
                <div class="col-12 col-sm-4 mb-2">
                    <a href="#"><img src="<?php echo DOMAIN ?>/public/images/public-images/logo-namad/logo-ecunion.png"
                                     alt="" class="bg-white rounded p-2" width="120" height="130"></a>
                </div>
                <div class="col-12 col-sm-4 text-sm-start mb-2">
                    <a href="#"><img src="<?php echo DOMAIN ?>/public/images/public-images/logo-namad/logo-enamad.png"
                                     alt="" class="bg-white rounded p-2" width="120" height="130"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- social networks -->
    <div class="social-networks text-center">
        <?php foreach ($social_networks as $social_network) { ?>
            <a href="<?= $social_network->network_address ?>" title="<?= $social_network->network_name ?>"><i
                        class="<?= $social_network->network_icon ?>"></i></a>
        <?php } ?>
    </div>
</div>
<div class="container-fluid text-center py-4">
    <span>تمامی حقوق مادی و معنوی این سایت متعلق به مایندباکس می باشد و هرگونه کپی برداری غیرقانونی محسوب خواهد شد.</span>
</div>