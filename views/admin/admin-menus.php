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
        <section class="main-content px-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5>منو</h5>
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
                            <th>نام منو</th>
                            <th>آدرس منو</th>
                            <th>وضعیت نمایش</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data['menu_all'] as $menu) { ?>
                            <tr>
                                <td><?= $menu->id ?></td>
                                <td><?= $menu->menu_name ?></td>
                                <td><?= $menu->menu_address ?></td>
                                <td><?php switch ($menu->status_show) {
                                        case "show":
                                            ?>
                                            <span class="badge bg-success p-2">فعال</span>
                                            <?php
                                            break;
                                        case "hide": ?>
                                            <span class="badge bg-danger p-2">غیرفعال</span>
                                            <?php break;
                                    } ?>
                                </td>
                                <td><?= $menu->create_time ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" title="غیرفعال"
                                           class="btn btn-sm btn-outline-secondary shadow-none"><i
                                                    class="fa-solid fa-toggle-off"></i></a>
                                        <a data-bs-toggle="modal" data-bs-target="#form" title="ویرایش"
                                           class="btn btn-sm btn-outline-primary shadow-none"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
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
                            <h5 class="modal-title">منو</h5>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-start">
                            <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post"
                                  class="border-form" id="form_add_menu">
                                <div class="mb-3">
                                    <label for="" class="mb-1">نام</label>
                                    <input type="text" class="form-control" id="menu_name">
                                </div>
                                <div class="mb-3">
                                    <label for="menu_address" class="mb-1">آدرس</label>
                                    <input type="text" class="form-control" id="menu_address">
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn btn-success" id="btn_menu">ثبت</button>
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
    let btn_menu = $("#btn_menu")
    let form_add_menu = $("#form_add_menu input button")
    $(document).ready(() => {
        btn_menu.click(() => {
            var menu_name = $("#menu_name").val().trim()
            var menu_address = $("#menu_address").val().trim()
            menu(menu_name, menu_address)
        })
    })

    function menu(menu_name, menu_address) {
        form_add_menu.prop('disabled', true)
        $.ajax({
            url: PATH + "/admin/add_menu",
            type: "POST",
            data: {menu_name: menu_name, menu_address: menu_address, btn_add_menu: true},
            success: (data) => {
                let obj = JSON.parse(data)
                let status = obj.statusCode
                let message = obj.data.message
                switch (status) {
                    case 200:
                        window.location.href = obj.data.redirect
                        break;
                    case 500:
                        alert_error(message)
                        break;
                }
            },
            error: () => {
                alert_error('خطا در ثبت منو')
                form_add_menu.prop('disabled', false)
            }
        }).done(() => {
            form_add_menu.prop('disabled', false)
        })
    }
</script>