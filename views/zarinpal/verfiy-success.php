<?php $result = $data['result']; ?>
<!-- payment result -->
<div class="container-fluid py-5">
    <div class="container">
        <!-- Successful payment -->
        <div class="card shadow w-lg-50 mx-auto">
            <div class="card-header bg-blue text-center p-4">
                <img src="<?= DOMAIN ?>/public/images/public-images/svg/success.svg" alt="" width="150">
                <h2 class="text-white fw-bold pb-2">پرداخت موفق !</h2>
                <h6 class="text-white">کاربر گرامی پرداخت شما موفق بود.</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between fs-6 py-2">
                    <span class="text-muted">مبلغ</span>
                    <span class="fw-bold"><?= number_format($result['amount']) ?> تومان</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between fs-6 py-2">
                    <span class="text-muted">کد رهگیری</span>
                    <span class="fw-bold"><?= $result['zarinpal']['RefID'] ?></span>
                </div>
                <hr>
                <div class="d-flex justify-content-between fs-6 py-2">
                    <span class="text-muted">تاریخ و ساعت</span>
                    <span class="fw-bold"><?= $result['time'] ?></span>
                </div>
            </div>
            <div class="card-footer d-grid">
                <a href="<?= DOMAIN ?>/account/my_courses" class="btn-blue">رفتن به دوره‌های من</a>
            </div>
        </div>
    </div>
</div>
