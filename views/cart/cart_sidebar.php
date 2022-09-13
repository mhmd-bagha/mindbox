<?php
$data_user = $data['data_user'];

?>
<div class="col-12 col-lg-5 col-xl-4">
    <!-- payment method -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <span class="fw-bold">انتخاب نحوه پرداخت</span>
            <hr>
            <div class="text-sm-center text-lg-start">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none form-check-input-orange" id="gateway" type="radio"
                           name="flexRadioDefault" checked>
                    <label for="gateway" class="form-check-label">درگاه پرداخت آنلاین</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none form-check-input-orange" id="wallet" type="radio"
                           name="flexRadioDefault" <?php if ($data_user->user_money == 0) echo 'disabled' ?>>
                    <label for="wallet" class="form-check-label">کیف پول (موجودی: <?= $data_user->user_money ?>
                        تومان)</label>
                </div>
            </div>
        </div>
    </div>
    <h5 class="fw-bold pb-3">خلاصه سفارش</h5>
    <!-- Wallet balance -->
    <div class="d-flex justify-content-between fs-6 pb-3">
        <span class="text-muted">موجودی کیف پول شما (تومان)</span>
        <span class="fw-bold"><?= $data_user->user_money ?></span>
    </div>
    <!-- total discounts -->
    <div class="d-flex justify-content-between fs-6 pb-3">
        <span class="text-muted">تخفیف (تومان)</span>
        <span class="fw-bold"><?= number_format($data['balance_all_discount']) ?></span>
    </div>
    <!-- total cart -->
    <div class="d-flex justify-content-between fs-6">
        <span class="text-muted">مجموع (تومان)</span>
        <span class="fw-bold"><?= number_format($data['balance_all']) ?></span>
    </div>
    <hr>
    <!-- buy -->
    <div class="d-grid">
        <a class="btn-orange" href="<?= DOMAIN ?>/checkout/request/<?= $this->model->encrypt(implode(',', $data_cart->courses_id)) ?>">اقدام به پرداخت</a>
    </div>
</div>