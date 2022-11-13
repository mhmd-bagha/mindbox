<div class="d-flex justify-content-between align-items-center">
    <h5>کیف پول</h5>
    <a data-bs-toggle="modal" data-bs-target="#price-wallet" class="btn btn-primary"><i
                class="fa-solid fa-plus me-2"></i>مبالغ پیشنهادی</a>
    <!-- modal management price wallet -->
    <div class="modal fade" id="price-wallet" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">مبالغ پیشنهادی</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- form -->
                    <form action="<?= currentUrl() ?>" method="post" class="border-form">
                        <div class="row">
                            <div class="col-12 col-sm-9 mb-3 mb-sm-0">
                                <label for="price_offer" class="mb-1">مبلغ (تومان)</label>
                                <input type="tel" class="form-control w-100" id="price_offer">
                            </div>
                            <div class="col-12 col-sm-3 d-grid align-self-end">
                                <button type="button" class="btn btn-success w-100" id="btn_price_offer">ثبت</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="table-responsive">
                        <!-- table -->
                        <table class="table table-borderless table-striped table-hover text-nowrap text-center">
                            <thead class="table-dark sticky-top">
                            <tr>
                                <th>#</th>
                                <th>مبلغ (تومان)</th>
                                <th>تاریخ</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $prices_offer = $this->model->where_all('information', 'information_type', 'price_offer_wallet');
                            foreach ($prices_offer as $price): ?>
                                <tr>
                                    <td><?= $price->id ?></td>
                                    <td><?= number_format($price->information_data) ?></td>
                                    <td><?= $price->create_time ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="حذف"
                                               class="btn btn-sm btn-outline-danger shadow-none"
                                               onclick="deleteItem(<?= $price->id ?>, 'information')"><i
                                                        class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var btn_price_offer = $("#btn_price_offer")
    $(document).ready(() => {
        btn_price_offer.click(() => {
            var price_offer_input = $("#price_offer").val().trim()
            if (!empty(price_offer_input)) {
                price_offer(price_offer_input)
            } else alert_error('فیلد مبلغ اجباری است')
        })
    })

    function price_offer(price) {
        btn_price_offer.prop('disabled', true).text('بررسی...')
        $.post(PATH + "/admin_information/price_offer", {price: price}, (data) => {
            let obj = JSON.parse(data)
            let message = obj.data.message
            let status_code = obj.statusCode
            btn_price_offer.prop('disabled', false).text('ثبت')
            switch (status_code) {
                case 200:
                    alert_success(message)
                    setTimeout(() => location.reload(), 3000)
                    break;
                case 500:
                    alert_error(message)
                    break;
            }
        })
    }
</script>