<?php $data_cart = $data['data_cart']; ?>
<main>
    <!-- cart -->
    <div class="container-fluid py-5">
        <div class="container">
            <h4 class="fw-bold">سبد خرید</h4>
            <hr>
            <div class="row">
                <div class="col-12 col-lg-7 col-xl-8">
                    <?php require 'courses.php' ?>
                </div>
                <?php require 'cart_sidebar.php' ?>
            </div>
        </div>
    </div>
</main>