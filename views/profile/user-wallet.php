<!-- main -->
<main>
    <div class="container-fluid py-5">
        <div class="container">
            <div class="card border-0 rounded-0 box-shadow-sm">
                <div class="card-body p-0">
                    <div class="row mx-0">
                        <div class="col-12 col-lg-3 user-menu">
                            <!-- user menu -->
                            <?php
                            require_once("user-menu.php");
                            ?>
                        </div>
                        <div class="col-12 col-lg-9 user-content">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>کیف پول</h5>
                                <a href="user-add-ticket.php" class="btn-blue" data-bs-toggle="modal"
                                   data-bs-target="#wallet-charging">شارژ حساب</a>
                                <!-- modal wallet charging -->
                                <div class="modal fade" id="wallet-charging" tabindex="-1" data-bs-backdrop="static">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">شارژ کیف پول</h6>
                                                <button type="button" class="btn-close shadow-none"
                                                        data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row text-center mb-3">
                                                    <?php $prices_offer = $this->model->where_all('information', 'information_type', 'price_offer_wallet');
                                                    foreach ($prices_offer as $price): ?>
                                                        <div class="col-6 col-sm-3 mb-2 mb-sm-0">
                                                            <button class="btn-blue"
                                                                    data-bs-price="<?= $price->information_data ?>"
                                                                    id="price-<?= $price->id ?>"
                                                                    onclick="price_wallet('price-<?= $price->id ?>', 'input-price')"><?= number_format($price->information_data) ?></button>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                <form action="<?= currentUrl() ?>" method="post" class="border-form"
                                                      id="form_charge_wallet">
                                                    <div class="mb-3">
                                                        <label class="mb-1">مبلغ (تومان)</label>
                                                        <input type="text" class="form-control" id="input-price">
                                                        <small>حداقل مبلغ <?= DEFAULT_CHARGE_WALLET ?> تومان می
                                                            باشد.</small>
                                                    </div>
                                                    <div class="text-end">
                                                        <button class="btn-orange" type="button" id="go_charge">شارژ
                                                            حساب
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <?php if (is_array($data['wallet_payment']) && !empty($data['wallet_payment'])): ?>
                                <div class="table-responsive overflow-y-auto">
                                    <!-- table -->
                                    <table class="table table-striped table-hover table-bordered text-center text-nowrap">
                                        <thead class="table-dark sticky-top">
                                        <tr>
                                            <th>مبلغ (تومان)</th>
                                            <th>وضعیت پرداخت</th>
                                            <th>تاریخ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($data['wallet_payment'] as $wallet_pay): ?>
                                            <tr>
                                                <td><?= number_format($wallet_pay->payment_order) ?></td>
                                                <td><?php switch ($wallet_pay->status) {
                                                        case "waiting":
                                                            ?><span class="text-warning">پرداخت معلق</span><?php break;
                                                        case "paid":
                                                            ?><span class="text-success">پرداخت موفق</span><?php break;
                                                        case "unsuccessful":
                                                            ?>
                                                            <span class="text-danger">پرداخت ناموفق</span>
                                                            <?php break;
                                                    } ?></td>
                                                <td><?= $wallet_pay->create_time ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else: Model::alert_null_data('تراکنشی انجام نشده!', 'alert-primary fs-6 text-center'); endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    var go_charge = $("#go_charge")
    var form_charge_wallet = $("#form_charge_wallet input, #form_charge_wallet button")
    $(document).ready(() => {
        go_charge.click(() => {
            var input_price = $("#input-price").val().trim()
            if (!empty(input_price)) {
                if (input_price >= <?= DEFAULT_CHARGE_WALLET ?>) {
                    charge_wallet(input_price)
                } else alert_error('حداقل مبلغ شارژ <?= DEFAULT_CHARGE_WALLET ?> تومان میباشد')
            } else alert_error('فیلد مبلغ اجباری است')
        })
    })

    function charge_wallet(price) {
        form_charge_wallet.prop('disabled', true)
        go_charge.text('در حال بررسی...').addClass('disabled btn_dot-flashing')
        $.post(PATH + "/checkout/charge_wallet_request", {price: price}, (data) => {
            let obj = JSON.parse(data)
            let message = obj.data.message
            let status_code = obj.statusCode
            form_charge_wallet.prop('disabled', false)
            switch (status_code) {
                case 200:
                    let redirect = obj.data.redirect
                    location.href = redirect
                    break;
                case 500:
                    go_charge.text('شارژ حساب').removeClass('disabled btn_dot-flashing')
                    alert_error(message)
                    break;
            }
        })
    }
</script>