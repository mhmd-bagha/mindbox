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
                                <a data-bs-toggle="modal" data-bs-target="#form" title="ویرایش"
                                   class="btn btn-sm btn-outline-primary shadow-none"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i
                                            class="fa-solid fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
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
                                    <img data-src="<?= DOMAIN ?>/public/images/category/<?= $category->category_image . '/' . $category->category_image ?>" alt=""
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
<?php }else Model::alert_null_data(); ?>