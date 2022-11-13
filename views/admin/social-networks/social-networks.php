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
                            <a data-bs-toggle="modal" data-bs-target="#edit_<?= $social_network->id ?>" title="ویرایش"
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
                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"
                               onclick="deleteItem(<?= $social_network->id ?>, 'social_networks')"><i
                                        class="fa-solid fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <!-- modal edit & add -->
                <div class="modal fade" id="edit_<?= $social_network->id ?>" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">شبکه اجتماعی</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post"
                                      class="border-form" id="form_network_edit_<?= $social_network->id ?>">
                                    <div class="mb-3">
                                        <label for="network_name_edit" class="mb-1">نام</label>
                                        <input type="text" class="form-control"
                                               id="network_name_edit_<?= $social_network->id ?>"
                                               value="<?= $social_network->network_name ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="network_address_edit" class="mb-1">آدرس</label>
                                        <input type="text" class="form-control"
                                               id="network_address_edit_<?= $social_network->id ?>"
                                               value="<?= $social_network->network_address ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="network_icon_edit" class="mb-1">آیکن</label>
                                        <select class="form-control" id="network_icon_edit_<?= $social_network->id ?>">
                                            <option value="<?= $social_network->network_icon ?>"
                                                    selected><?= icon_name[$social_network->network_icon] ?></option>
                                            <option value="fa-brands fa-instagram"><?= icon_name['fa-brands fa-instagram'] ?></option>
                                            <option value="fa-brands fa-youtube"><?= icon_name['fa-brands fa-youtube'] ?></option>
                                            <option value="fa-solid fa-compact-disc"><?= icon_name['fa-solid fa-compact-disc'] ?></option>
                                            <option value="fa-solid fa-paper-plane"><?= icon_name['fa-solid fa-paper-plane'] ?></option>
                                            <option value="fa-brands fa-facebook"><?= icon_name['fa-brands fa-facebook'] ?></option>
                                            <option value="fa-brands fa-twitter"><?= icon_name['fa-brands fa-twitter'] ?></option>
                                            <option value="fa-solid fa-envelope"><?= icon_name['fa-solid fa-envelope'] ?></option>
                                        </select>
                                    </div>
                                    <div class="text-end">
                                        <button type="button" class="btn btn-success py-2 px-5"
                                                id="btn_network_edit_edit_<?= $social_network->id ?>"
                                                onclick="network_edit(<?= $social_network->id ?>, 'network_name_edit_<?= $social_network->id ?>', 'network_address_edit_<?= $social_network->id ?>', 'network_icon_edit_<?= $social_network->id ?>', 'btn_network_edit_edit_<?= $social_network->id ?>', 'form_network_edit_<?= $social_network->id ?>')">
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
    function network_edit(id, name, address, icon, button, form) {
        // form and button
        var btn_network_edit = $("#" + button + "")
        var form_network_edit = $("#" + form + " input", "#" + form + " select")
        // var
        var network_name_edit = $("#" + name + "").val().trim()
        var network_address_edit = $("#" + address + "").val().trim()
        var network_icon_edit = $("#" + icon + "").val()
        if (!empty(network_name_edit) && !empty(network_address_edit) && !empty(network_icon_edit)) {
            btn_network_edit.text('در حال ثبت...').prop('disabled', true).addClass('disabled pointer-events btn_success_dot-flashing')
            form_network_edit.prop('disabled', true)
            $.ajax({
                url: PATH + "/admin_social_networks/network",
                type: "POST",
                data: {
                    network_name: network_name_edit,
                    network_address: network_address_edit,
                    network_icon: network_icon_edit,
                    type: 'edit',
                    id: id
                },
                success: (data) => {
                    let obj = JSON.parse(data)
                    let message = obj.data.message
                    let status_code = obj.statusCode
                    switch (status_code) {
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
                    alert_error('خطا در افزودن شبکه اجتماعی')
                }
            }).done(() => {
                btn_network_edit.text('ثبت').prop('disabled', false).removeClass('disabled pointer-events btn_success_dot-flashing')
                form_network_edit.prop('disabled', false)
            })
        } else {
            if (empty(network_name_edit))
                alert_error('فیلد عنوان اجباری است')
            if (empty(network_address_edit))
                alert_error('فیلد آدرس اجباری است')
            if (empty(network_icon_edit))
                alert_error('آیکون مورد نظر را انتخاب کنید')
        }
    }
</script>