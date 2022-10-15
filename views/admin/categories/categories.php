<!-- card -->
<?php if (!empty($data['categories_all'])) { ?>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <!-- table -->
            <table id="table" class="table table-borderless table-striped table-hover text-center">
                <thead class="table-dark text-nowrap sticky-top">
                <tr>
                    <th>#</th>
                    <th>نام دسته بندی</th>
                    <th>تاریخ ایجاد</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['categories_all'] as $category) { ?>
                    <tr>
                        <td><?= $category->id ?></td>
                        <td><?= $category->category_title ?></td>
                        <td><?= $category->create_time ?></td>
                        <td>
                            <div class="btn-group">
                                <a data-bs-toggle="modal" data-bs-target="#show-more-img-<?= $category->id ?>"
                                   title="نمایش بیشتر"
                                   class="btn btn-sm btn-outline-info shadow-none"><i
                                            class="fa-solid fa-eye"></i></a>
                                <?php switch ($category->status_show) {
                                    case "hide":
                                        ?>
                                        <a href="#" title="غیرفعال"
                                           class="btn btn-sm btn-outline-secondary shadow-none"
                                           onclick="enable('<?= $category->id ?>', 'آیا میخواهید این دسته بندی را را فعال کنید؟', 'categories')"><i
                                                    class="fa-solid fa-toggle-off"></i></a>
                                        <?php break;
                                    case "show": ?>
                                        <a href="#" title="فعال"
                                           class="btn btn-sm btn-outline-success shadow-none"
                                           onclick="disable('<?= $category->id ?>', 'آیا میخواهید این دسته بندی را غیر فعال کنید؟', 'categories')"><i
                                                    class="fa-solid fa-toggle-on"></i></a>
                                        <?php break;
                                } ?>
                                <a data-bs-toggle="modal" data-bs-target="#edit_<?= $category->id ?>" title="ویرایش"
                                   class="btn btn-sm btn-outline-primary shadow-none"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                        </td>
                    </tr>
                    <!-- modal edit -->
                    <div class="modal fade" id="edit_<?= $category->id ?>" tabindex="-1" data-bs-backdrop="static">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">دسته بندی</h5>
                                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body text-start">
                                    <form action="<?= htmlspecialchars(currentUrl()) ?>" method="post" class="border-form"
                                          id="form_category_edit_<?= $category->id ?>">
                                        <div class="mb-3">
                                            <label for="title_category_edit_<?= $category->id ?>" class="mb-1">نام</label>
                                            <input type="text" class="form-control" id="title_category_edit_<?= $category->id ?>" value="<?= $category->category_title ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="img_category_edit_<?= $category->id ?>" class="mb-1">تصویر</label>
                                            <input type="file" class="form-control" id="img_category_edit_<?= $category->id ?>">
                                            <div id="progressShow_edit_<?= $category->id ?>" style="display: none">
                                                <div class="progress progress_load">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated" id="progressBar_edit_<?= $category->id ?>" role="progressbar"></div>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <p id="status_edit_<?= $category->id ?>" class="text-secondary me-2"></p>
                                                    <p id="loaded_n_total_edit_<?= $category->id ?>" class="text-secondary"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-success py-2 px-5" id="btn_category_edit_<?= $category->id ?>" onclick="category_edit(<?= $category->id ?>, 'btn_category_edit_<?= $category->id ?>', 'form_category_edit_<?= $category->id ?>', 'title_category_edit_<?= $category->id ?>', 'img_category_edit_<?= $category->id ?>', 'progressShow_edit_<?= $category->id ?>', 'loaded_n_total_edit_<?= $category->id ?>', 'progressBar_edit_<?= $category->id ?>', 'status_edit_<?= $category->id ?>')">ثبت</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal show more -->
                    <div class="modal fade" id="show-more-img-<?= $category->id ?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">تصویر دسته بندی</h5>
                                    <button type="button" class="btn-close shadow-none"
                                            data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <img data-src="<?= DOMAIN ?>/public/images/category/<?= $category->category_image . '/' . $category->category_image ?>"
                                         alt=""
                                         class="img-fluid lozad">
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
        function category_edit(id, button, form, title, img, progressShow, loaded_n_total, progressBar, status) {
            // form and btn
            var btn_category = $("#" + button + "")
            var form_category = $("#" + form + " input")
            // var
            var title_category = $("#" + title + "").val()
            var img_category = $("#" + img + "").prop('files')[0]
            // check n't empty
            if (!empty(title_category)) {
                // form data
                var formData = new FormData()
                formData.append('category_name', title_category)
                formData.append('category_image', img_category)
                formData.append('id', id)
                // disable btn and input's form
                form_category.prop('disabled', true)
                btn_category.prop('disabled', true).text('در حال بررسی...').addClass('disabled pointer-events btn_success_dot-flashing')
                $.ajax({
                    url: PATH + "/admin_categories/edit",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: (data) => {
                        let obj = JSON.parse(data)
                        let message = obj.data.message
                        let status_code = obj.statusCode
                        switch (status_code) {
                            case 200:
                                if (!obj.data.upload_img) {
                                    alert_success(message)
                                    setTimeout(() => location.reload(), 3000)
                                } else {
                                    alert_success(message, 'success', 1400)
                                    uploadFile_ajax(img_category, obj.data.img_name, 'category', progressShow, loaded_n_total, progressBar, status)
                                    setTimeout(() => alert_success("<?= warnings['file_uploading'] ?>", 'warning'), 1500)
                                }
                                break;
                            case 500:
                                alert_error(message)
                                form_category.prop('disabled', true)
                                btn_category.prop('disabled', true).text('در حال بررسی...').addClass('disabled pointer-events btn_success_dot-flashing')
                                break;
                        }
                    },
                    error: () => {
                        alert_error('خطا در ارسال اطلاعات')
                        form_category.prop('disabled', true)
                        btn_category.prop('disabled', true).text('در حال بررسی...').addClass('disabled pointer-events btn_success_dot-flashing')
                    }
                })
            } else {
                if (empty(title_category)) alert_error('عنوان دسته بندی اجباری است')
            }
        }
    </script>
<?php } else Model::alert_null_data(); ?>