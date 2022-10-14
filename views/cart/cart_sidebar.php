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
                    <input class="form-check-input shadow-none form-check-input-orange" type="radio" value="gateway"
                           id="gateway"
                           name="select_payment" checked>
                    <label for="gateway" class="form-check-label">درگاه پرداخت (زرین پال)</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none form-check-input-orange" type="radio" value="wallet"
                           id="wallet"
                           name="select_payment" <?php if ($data_user->user_money < $data['balance_all']) echo 'disabled' ?>>
                    <label for="wallet" class="form-check-label">کیف پول
                        (موجودی: <?= number_format($data_user->user_money) ?> تومان)</label>
                </div>
            </div>
        </div>
    </div>
    <h5 class="fw-bold pb-3">خلاصه سفارش</h5>
    <!-- Wallet balance -->
    <div class="d-flex justify-content-between fs-6 pb-3">
        <span class="text-muted">موجودی کیف پول شما (تومان)</span>
        <span class="fw-bold"><?= number_format($data_user->user_money) ?></span>
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
        <a class="btn-orange"
           href="<?= DOMAIN ?>/checkout/request/<?= $this->model->encrypt(implode(',', $data_cart->courses_id)) ?>"
           id="go_pay">اقدام به پرداخت</a>
    </div>
</div>
<script>
    $(document).ready(() => {
        var go_pay = $("#go_pay")
        var go_wallet = $("#go_wallet")
        var select_payment = $("input[name='select_payment']")
        // disable btn go pay
        go_pay.click(() => {
            go_pay.text('در حال بررسی...').addClass('disabled pointer-events btn_dot-flashing')
        })
        // select pay
        select_payment.click(() => {
            go_pay.addClass('disabled pointer-events btn_dot-flashing')
            setTimeout(() => {
                var type_pay = $("input[name='select_payment']:checked").val()
                switch (type_pay) {
                    case "gateway":
                        go_pay.attr('href', "<?= DOMAIN ?>/checkout/request/<?= $this->model->encrypt(implode(',', $data_cart->courses_id)) ?>")
                        break;
                    case "wallet":
                        go_pay.attr('href', '#').attr('onclick', 'pay_wallet()')
                        break;
                }
                go_pay.removeClass('disabled pointer-events btn_dot-flashing')
            }, 1500)
        })
    })

    function pay_wallet() {
        $.ajax({
            url: PATH + "/checkout/wallet_request/<?= $this->model->encrypt(implode(',', $data_cart->courses_id)) ?>",
            type: "POST",
            success: (data) => {
                let obj = JSON.parse(data)
                let message = obj.data.message
                let status_code = obj.statusCode
                switch (status_code) {
                    case 200:
                        var redirect = obj.data.redirect
                        alert_success(message)
                        setTimeout(() => location.href = redirect, 3000)
                        break;
                    case 500:
                        alert_error(message)
                        break;
                }
            },
            error: () => alert_error('خطا در پرداخت از طریق کیف پول'),
        })
    }
</script>