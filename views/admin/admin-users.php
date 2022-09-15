<div class="container-fluid">
    <!-- sidebar -->
    <?php
    require_once("admin-menu.php");
    ?>
    <!-- content wrapper -->
    <section class="content-wrapper">
        <!-- header content -->
        <?php
        require_once("admin-header.php");
        ?>
        <!-- main content -->
        <section class="main-content px-3 pt-1">
            <h5>کاربران</h5>
            <hr>
            <?php if (is_array($data['user_all']) || is_object($data['user_all'])) { ?>
                <!-- card -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <!-- table -->
                        <table id="table" class="table table-borderless table-striped table-hover text-center">
                            <thead class="table-dark text-nowrap sticky-top">
                            <tr>
                                <th>#</th>
                                <th>نام و نام خانوادگی</th>
                                <th>ایمیل</th>
                                <th>شماره همراه</th>
                                <th>وضعیت کاربر</th>
                                <th>موجودی کیف پول (تومان)</th>
                                <th>تاریخ ثبت نام</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data['user_all'] as $user) { ?>
                                <tr>
                                    <td><?= $user->id ?></td>
                                    <td><?= $user->first_name . ' ' . $user->last_name ?></td>
                                    <td><a href="mailto:<?= $user->user_email ?>"
                                           target="_blank"><?= $user->user_email ?></a></td>
                                    <td><a href="tel:<?= $user->phone_mobile ?>"
                                           target="_blank"><?= $user->phone_mobile ?></a></td>
                                    <td><?php switch ($user->user_status) {
                                            case "enable":
                                                ?>
                                                <span class="badge bg-success p-2">فعال</span>
                                                <?php
                                                break;
                                            case "disable": ?>
                                                <span class="badge bg-danger p-2">غیرفعال</span>
                                                <?php break;
                                        } ?></td>
                                    <td><?= $user->user_money ?></td>
                                    <td><?= $user->create_time ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a data-bs-toggle="modal" data-bs-target="#recharge-wallet-<?= $user->id ?>"
                                               title="شارژ کیف پول"
                                               class="btn btn-sm btn-outline-primary shadow-none"><i
                                                        class="fa-solid fa-wallet"></i></a>
<!--                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i-->
<!--                                                        class="fa-solid fa-trash"></i></a>-->
                                        </div>
                                    </td>
                                </tr>
                                <!-- modal recharge wallet -->
                                <div class="modal fade" id="recharge-wallet-<?= $user->id ?>" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">شارژ کیف پول</h5>
                                                <button type="button" class="btn-close shadow-none"
                                                        data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body text-start">
                                                <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>/admin_users/replace_wallet"
                                                      method="post" class="border-form">
                                                    <div class="mb-3">
                                                        <label for="price_replace_wallet_<?= $user->id ?>" class="mb-1">مبلغ
                                                            (تومان)</label>
                                                        <input type="tel" class="form-control"
                                                               id="price_replace_wallet_<?= $user->id ?>"/>
                                                        <small>مبلغ موردنظر جایگزین موجودی کیف پول کاربر می شود.</small>
                                                    </div>
                                                    <div class="text-end">
                                                        <button type="button" class="btn btn-success"
                                                                id="btn_price_replace_wallet_<?= $user->id ?>"
                                                                onclick="replace_price_wallet('<?= $user->id ?>')">ثبت
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } else {
                Model::alert_null_data('کاربری موجود نیست!');
            } ?>
        </section>
    </section>
</div>
<script>
    function replace_price_wallet(id) {
        var PATH = "<?= DOMAIN ?>"
        var price_replace = $("#price_replace_wallet_" + id)
        var btn_price_replace_wallet = $("#btn_price_replace_wallet_" + id)
        btn_price_replace_wallet.prop('disabled', true)
        price_replace.prop('disabled', true)
        $.ajax({
            url: PATH + "/admin/",
            type: "POST",
            data: {price_replace: price_replace, id: id, btn_replace_wallet: true},
            success: (data) => {
                let obj = JSON.parse(data)
                let status = obj.statusCode
                let message = obj.data.message
                switch (status) {
                    case 200:
                        alert_success(message)
                        break;
                    case 500:
                        alert_error(message)
                        break;
                }
            },
            error: () => {
                alert_error('خطا در ارتباط با سرور')
            },
        }).done(() => {
            btn_price_replace_wallet.prop('disabled', false)
            price_replace.prop('disabled', false)
        })
    }
</script>
<!-- admin backdrop -->
<div class="admin-backdrop"></div>
