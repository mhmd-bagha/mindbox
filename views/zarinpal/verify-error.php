<?php $result = $data['result']; ?>
<!-- payment result -->
<div class="container-fluid py-5">
    <div class="container">
        <!-- Payment failed -->
        <div class="card shadow w-lg-50 mx-auto">
            <div class="card-header bg-blue text-center p-4">
                <img src="<?= DOMAIN ?>/public/images/pubilc-images/svg/failed.svg" alt="" width="150">
                <h3 class="fw-bold text-white">پرداخت ناموفق !</h3>
                <h6 class="text-white">کاربر گرامی پرداخت شما ناموفق بود.</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between fs-6 py-2">
                    <span class="text-muted">مبلغ</span>
                    <span class="fw-bold"><?= number_format($result['amount']) ?> تومان</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between fs-6 py-2">
                    <span class="text-muted">تاریخ و ساعت</span>
                    <span class="fw-bold"><?= $result['time'] ?></span>
                </div>
                <hr>
                <div class="text-center">
                    <span class="d-block fw-bold">توجه</span>
                    <span class="d-block"><?= $result['zarinpal']['Message'] ?></span>
                    <span class="d-block">در صورتی که نتیجه همچنان در حالت "پرداخت ناموفق" باقی ماند، قبل از اقدام مجدد، با مدیر سایت <a
                                href="<?= DOMAIN ?>/information/contactUs" target="_blank">تماس</a> بگیرید.</span>
                </div>
            </div>
            <div class="card-footer d-grid">
                <a href="<?= DOMAIN ?>" class="btn-blue">بازگشت به صفحه اصلی</a>
            </div>
        </div>
    </div>
</div>