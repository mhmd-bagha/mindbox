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
            <div class="d-flex justify-content-between align-items-center">
                <h5>شبکه های اجتماعی</h5>
                <a data-bs-toggle="modal" data-bs-target="#form" class="btn btn-primary"><i
                            class="fa-solid fa-plus me-2"></i>ایجاد کردن</a>
            </div>
            <hr>
            <!-- card -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <!-- table -->
                    <table id="table" class="table table-borderless table-striped table-hover text-center">
                        <thead class="table-dark text-nowrap sticky-top">
                        <tr>
                            <th>#</th>
                            <th>نام</th>
                            <th>آدرس</th>
                            <th>آیکن</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data['social_networks'] as $social_network) { ?>
                            <tr>
                                <td><?= $social_network->id ?></td>
                                <td><?= $social_network->network_name ?></td>
                                <td><a href="<?= $social_network->network_address ?>">لینک</a></td>
                                <td><i class="fab <?= $social_network->network_icon ?> fs-6"></i></td>
                                <td>
                                    <div class="btn-group">
                                        <a data-bs-toggle="modal" data-bs-target="#form" title="ویرایش"
                                           class="btn btn-sm btn-outline-primary shadow-none"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                        <?php switch ($social_network->status_show) {
                                            case "hide":
                                                ?>
                                                <a href="#" title="غیرفعال"
                                                   class="btn btn-sm btn-outline-secondary shadow-none"
                                                   onclick="enable('<?= $social_network->id ?>', 'آیا میخواهید این شبکه اجتماعی را را فعال کنید؟', 'social_networks')"><i
                                                            class="fa-solid fa-toggle-off"></i></a>
                                                <?php break;
                                            case "show": ?>
                                                <a href="#" title="فعال"
                                                   class="btn btn-sm btn-outline-success shadow-none"
                                                   onclick="disable('<?= $social_network->id ?>', 'آیا میخواهید این شبکه اجتماعی را غیر فعال کنید؟', 'social_networks')"><i
                                                            class="fa-solid fa-toggle-on"></i></a>
                                                <?php break;
                                        } ?>
                                        <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i
                                                    class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- modal edit & add -->
            <div class="modal fade" id="form" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">شبکه اجتماعی</h5>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-start">
                            <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post"
                                  class="border-form" id="form_network">
                                <div class="mb-3">
                                    <label for="network_name" class="mb-1">نام</label>
                                    <input type="text" class="form-control" id="network_name">
                                </div>
                                <div class="mb-3">
                                    <label for="network_address" class="mb-1">آدرس</label>
                                    <input type="text" class="form-control" id="network_address">
                                </div>
                                <div class="mb-3">
                                    <label for="network_icon" class="mb-1">آیکن</label>
                                    <select class="form-control" id="network_icon">
                                        <option disabled selected>انتخاب کنید...</option>
                                        <option value="fa-brands fa-instagram">اینستاگرام</option>
                                        <option value="fa-brands fa-youtube">یوتوب</option>
                                        <option value="fa-solid fa-compact-disc">آپارات</option>
                                        <option value="fa-solid fa-paper-plane">تلگرام</option>
                                        <option value="fa-brands fa-facebook">فیسبوک</option>
                                        <option value="fa-brands fa-twitter">توییتر</option>
                                        <option value="fa-solid fa-envelope">ایمیل</option>
                                    </select>
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn btn-success" id="btn_network">ثبت</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</div>
<!-- admin backdrop -->
<div class="admin-backdrop"></div>
<script>
    var btn_network = $("#btn_network")
    var form_network = $("#form_network input select button")
    $(document).ready(() => {
        btn_network.click(() => {
            var network_name = $("#network_name").val().trim()
            var network_address = $("#network_address").val().trim()
            var network_icon = $("#network_icon").val().trim()
            if (!empty(network_name) && !empty(network_address) && !empty(network_icon)) {
                network(network_name, network_address, network_icon)
            } else {
                if (empty(network_name))
                    alert_error('فیلد عنوان اجباری است')
                if (empty(network_address))
                    alert_error('فیلد آدرس اجباری است')
                if (empty(network_icon))
                    alert_error('آیکون مورد نظر را انتخاب کنید')
            }
        })
    })

    function network(network_name, network_address, network_icon) {
        btn_network.text('در حال ثبت...')
        form_network.prop('disabled', true)
        $.ajax({
            url: PATH + "/admin_social_networks/add_network",
            type: "POST",
            data: {
                network_name: network_name,
                network_address: network_address,
                network_icon: network_icon,
                btn_network: true
            },
            success: (data) => {
                let obj = JSON.parse(data)
                let message = obj.data.message
                let status_code = obj.statusCode
                switch (status_code) {
                    case 200:
                        alert_success(message)
                        setTimeout(() => {
                            window.location.href = obj.data.redirect
                        }, 3000)
                        break;
                    case 500:
                        alert_error(message)
                        break;
                }
            },
            error: () => {
                alert_error('خطا در افزودن شبکه اجتماعی')
                btn_network.text('ثبت')
                form_network.prop('disabled', false)
            }
        }).done(() => {
            btn_network.text('ثبت')
            form_network.prop('disabled', false)
        })
    }
</script>