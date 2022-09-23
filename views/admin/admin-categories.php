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
                <h5>دسته بندی ها</h5>
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
                            <th>نام دسته بندی</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data['categories_all'] as $category){ ?>
                        <tr>
                            <td><?= $category->id ?></td>
                            <td><?= $category->category_title ?></td>
                            <td><?= $category->create_time ?></td>
                            <td>
                                <div class="btn-group">
                                    <a data-bs-toggle="modal" data-bs-target="#show-more-img-<?= $category->id ?>" title="نمایش بیشتر"
                                       class="btn btn-sm btn-outline-info shadow-none"><i
                                                class="fa-solid fa-eye"></i></a>
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
                                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img data-src="<?= DOMAIN ?>/public/images/<?= $category->category_image ?>" alt="" class="img-fluid lozad">
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                            <h5 class="modal-title">دسته بندی</h5>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-start">
                            <form action="" method="" class="border-form">
                                <div class="mb-3">
                                    <label for="" class="mb-1">نام</label>
                                    <input type="tel" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="mb-1">تصویر</label>
                                    <input type="file" class="form-control">
                                    <div class="progress mt-2">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                             role="progressbar" style="width: 50%;">50%
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success">ثبت</button>
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
