<?php if (is_array($data['end_users']) || is_object($data['end_users'])) { ?>
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <h6 class="fw-bold mb-4">آخرین کاربران</h6>
            <div class="table-responsive">
                <table class="table table-hover text-nowrap">
                    <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th>نام و نام خانوادگی</th>
                        <th>شماره همراه</th>
                        <th>ایمیل</th>
                        <th>وضعیت کاربر</th>
                        <th>موجودی کیف پول (تومان)</th>
                        <th>تاریخ ثبت نام</th>
                    </tr>
                    </thead>
                    <tbody class="text-muted">
                    <?php foreach ($data['end_users'] as $end_user) { ?>
                        <tr>
                            <td><?= $end_user->id ?></td>
                            <td><?= $end_user->first_name . ' ' . $end_user->last_name ?></td>
                            <td><?= $end_user->phone_mobile ?></td>
                            <td><?= $end_user->user_email ?></td>
                            <td><?php switch ($end_user->user_status) {
                                    case "enable":
                                        ?>
                                        <span class="badge bg-success p-2">فعال</span>
                                        <?php
                                        break;
                                    case "disable": ?>
                                        <span class="badge bg-danger p-2">غیرفعال</span>
                                        <?php break;
                                } ?></td>
                            <td><?= $end_user->user_money ?></td>
                            <td><?= $end_user->create_time ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>
