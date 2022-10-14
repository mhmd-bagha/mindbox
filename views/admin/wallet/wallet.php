<?php if (is_array($data['wallet_payments']) && !empty($data['wallet_payments'])): ?>
    <!-- card -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <!-- table -->
            <table id="table" class="table table-borderless table-striped table-hover text-center">
                <thead class="table-dark text-nowrap sticky-top">
                <tr>
                    <th>#</th>
                    <th>نام و نام خانوادگی کاربر</th>
                    <th>ایمیل کاربر</th>
                    <th>شماره همراه کاربر</th>
                    <th>مبلغ شارژ (تومان)</th>
                    <th>وضعیت پرداخت</th>
                    <th>شماره پیگیری</th>
                    <th>تاریخ تراکنش</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['wallet_payments'] as $wallet_pay): $get_user = $this->model->where('users', 'id', $wallet_pay->user_id) ?>
                    <tr>
                        <td><?= $wallet_pay->id ?></td>
                        <td><?= $get_user->first_name . ' ' . $get_user->last_name ?></td>
                        <td><?= $get_user->user_email ?></td>
                        <td><?= $get_user->phone_mobile ?></td>
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
                        <td><?= $wallet_pay->ref_id ?></td>
                        <td><?= $wallet_pay->create_time ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php else: Model::alert_null_data('تراکنشی تا کنون ثبت نشده'); endif; ?>