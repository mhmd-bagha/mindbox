<!-- content -->
<div class="tab-pane fade show active" id="tab-rules">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5>قوانین</h5>
        <a data-bs-toggle="modal" data-bs-target="#form" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>ایجاد
            کردن</a>
    </div>
    <!-- table -->
    <table id="table" class="table table-borderless table-striped table-hover text-center">
        <thead class="table-dark text-nowrap sticky-top">
        <tr>
            <th>#</th>
            <th>عنوان قوانین</th>
            <th>وضعیت نمایش</th>
            <th>تاریخ ایجاد</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['rules'] as $rule) {
            $rule_data = json_decode($rule->information_data); ?>
            <tr>
                <td><?= $rule->id ?></td>
                <td><?= $rule_data->rule_title ?></td>
                <td><?php switch ($rule->status_show) {
                        case "show":
                            ?><span class="badge bg-success p-2">فعال</span><?php break;
                        case "hide": ?>
                            <span class="badge bg-danger p-2">غیرفعال</span>
                            <?php break;
                    } ?></td>
                <td><?= $rule->create_time ?></td>
                <td>
                    <div class="btn-group">
                        <a data-bs-toggle="modal" data-bs-target="#show-more-rule-<?= $rule->id ?>" title="نمایش بیشتر"
                           class="btn btn-sm btn-outline-info shadow-none"><i class="fa-solid fa-eye"></i></a>
                        <a href="#" title="غیرفعال" class="btn btn-sm btn-outline-secondary shadow-none"><i
                                    class="fa-solid fa-toggle-off"></i></a>
                        <a data-bs-toggle="modal" data-bs-target="#form"
                           class="btn btn-sm btn-outline-primary shadow-none"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i
                                    class="fa-solid fa-trash"></i></a>
                    </div>
                </td>
            </tr>
            <!-- modal show more -->
            <div class="modal fade" id="show-more-rule-<?= $rule->id ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><?= $rule_data->rule_title ?></h5>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card my-3">
                                <div class="card-body text-wrap text-justify">
                                    <h6 class="fw-bold"><i class="fa-solid fa-receipt text-muted me-2"></i>توضیحات</h6>
                                    <p><?= $rule_data->rule_description ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </tbody>
    </table>
    <!-- modal edit & add -->
    <div class="modal fade" id="form" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">دوره</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-start">
                    <form action="<?= htmlspecialchars($_SERVER['REMOTE_ADDR']) ?>" method="post" class="border-form"
                          id="form_rule">
                        <div class="mb-3">
                            <label for="information_title" class="mb-1">عنوان</label>
                            <input type="text" class="form-control" id="information_title">
                        </div>
                        <div class="mb-3">
                            <label for="information_description" class="mb-1">توضیحات</label>
                            <textarea class="form-control" id="information_description"></textarea>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-success" id="btn_rule">ثبت</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var btn_rule = $("#btn_rule")
    var form_rule = $("#form_rule input textarea button")
    $(document).ready(() => {
        var btn_rule = $("#btn_rule")
        btn_rule.click(() => {
            var information_title = $("#information_title").val().trim()
            var information_description = $("#information_description").val().trim()
            add_rule(information_title, information_description)
        })
    })

    function add_rule(information_title, information_description) {
        btn_rule.text('در حال ثبت ...')
        form_rule.prop('disabled', true)
        $.ajax({
            url: PATH + "/admin_information/add_rules",
            type: "POST",
            data: {title: information_title, description: information_description, btn_rule: true},
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
                        form_rule.prop('disabled', false)
                        break;
                }
            },
            error: () => {
                form_rule.prop('disabled', true)
                alert_error('خطا در افزودن قانون')
                btn_rule.text('ثبت')
            }
        }).done(() => {
            btn_rule.text('ثبت')
            form_rule.prop('disabled', false)
        })
    }
</script>