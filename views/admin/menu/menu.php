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
                            <?php switch ($menu->status_show) {
                                case "hide":
                                    ?>
                                    <a href="#" title="غیرفعال"
                                       class="btn btn-sm btn-outline-secondary shadow-none"
                                       onclick="enable('<?= $menu->id ?>', 'آیا میخواهید این آیتم را را فعال کنید؟', 'menu')"><i
                                                class="fa-solid fa-toggle-off"></i></a>
                                    <?php break;
                                case "show": ?>
                                    <a href="#" title="فعال"
                                       class="btn btn-sm btn-outline-success shadow-none"
                                       onclick="disable('<?= $menu->id ?>', 'آیا میخواهید این آیتم را غیر فعال کنید؟', 'menu')"><i
                                                class="fa-solid fa-toggle-on"></i></a>
                                    <?php break;
                            } ?>
                            <a data-bs-toggle="modal" data-bs-target="#edit_<?= $menu->id ?>" title="ویرایش"
                               class="btn btn-sm btn-outline-primary shadow-none"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"
                               onclick="deleteItem(<?= $menu->id ?>, 'menu')"><i
                                        class="fa-solid fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <!-- modal edit -->
                <div class="modal fade" id="edit_<?= $menu->id ?>" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">منو</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post"
                                      class="border-form" id="form_edit_menu_<?= $menu->id ?>">
                                    <div class="mb-3">
                                        <label for="menu_name_edit" class="mb-1">نام</label>
                                        <input type="text" class="form-control" id="menu_name_edit_<?= $menu->id ?>"
                                               value="<?= $menu->menu_name ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="menu_address_edit" class="mb-1">آدرس</label>
                                        <input type="text" class="form-control" id="menu_address_edit_<?= $menu->id ?>"
                                               value="<?= $menu->menu_address ?>">
                                    </div>
                                    <div class="text-end">
                                        <button type="button" class="btn btn-success py-2 px-5"
                                                id="btn_menu_edit_<?= $menu->id ?>"
                                                onclick="menu_edit(<?= $menu->id ?>, 'menu_name_edit_<?= $menu->id ?>', 'menu_address_edit_<?= $menu->id ?>', 'btn_menu_edit_<?= $menu->id ?>', 'form_edit_menu_<?= $menu->id ?>')">
                                            ثبت
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
<script>
    function menu_edit(id, name, address, button, form) {
        // form and button
        let btn_menu = $("#" + button + "")
        let form_add_menu = $("#" + form + " input")
        // var
        var menu_name = $("#" + name + "").val().trim()
        var menu_address = $("#" + address + "").val().trim()
        if (!empty(menu_name) && !empty(menu_address)) {
            btn_menu.prop('disabled', true).text('در حال بررسی...').addClass('disabled pointer-events btn_success_dot-flashing')
            form_add_menu.prop('disabled', true)
            $.ajax({
                url: PATH + "/menu/menu",
                type: "POST",
                data: {menu_name: menu_name, menu_address: menu_address, id: id, type: 'edit'},
                success: (data) => {
                    let obj = JSON.parse(data)
                    let status = obj.statusCode
                    let message = obj.data.message
                    switch (status) {
                        case 200:
                            alert_success(message)
                            setTimeout(() => location.reload(), 3000)
                            break;
                        case 500:
                            alert_error(message)
                            break;
                    }
                },
                error: () => {
                    alert_error('خطا در ثبت منو')
                }
            }).done(() => {
                btn_menu.prop('disabled', false).text('ثبت').removeClass('disabled pointer-events btn_success_dot-flashing')
                form_add_menu.prop('disabled', false)
            })
        } else {
            if (empty(menu_name)) alert_error('فیلد نام اجباری است')
            if (empty(menu_address)) alert_error('فیلد نام اجباری است')
        }
    }
</script>