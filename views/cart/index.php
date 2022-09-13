<?php $data_cart = $data['data_cart']; ?>
<main>
    <!-- cart -->
    <div class="container-fluid py-5">
        <div class="container">
            <h4 class="fw-bold">سبد خرید</h4>
            <hr>
            <?php if ($data_cart) { ?>
                <div class="row">
                    <div class="col-12 col-lg-7 col-xl-8">
                        <?php require 'courses.php' ?>
                    </div>
                    <?php require 'cart_sidebar.php' ?>
                </div>
            <?php } else { ?>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="flex-column">
                        <img src="<?= DOMAIN ?>/public/images/pubilc-images/cart/empty-cart.png" alt="سبد خرید شما خالی است" class="img-fluid">
                        <p class="fs-6 text-muted text-center">می‌توانید برای مشاهده محصولات بیشتر به صفحات زیر بروید:</p>
                        <div class="d-flex justify-content-center align-items-center mt-4">
                            <a href="<?= DOMAIN ?>/courses/discounts" class="h5 fw-bold text-info me-5">تخفیف‌ها</a>
                            <a href="<?= DOMAIN ?>/courses" class="h5 fw-bold text-info">تمامی دوره ها</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>