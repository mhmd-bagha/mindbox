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
            <h5>نظرات</h5>
            <hr>
            <!-- card -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <!-- table -->
                    <table id="table" class="table table-borderless table-striped table-hover text-center">
                        <thead class="table-dark text-nowrap sticky-top">
                        <tr>
                            <th>#</th>
                            <th>نام دوره</th>
                            <th>نام و نام خانوادگی کاربر</th>
                            <th>ایمیل کاربر</th>
                            <th>شماره همراه کاربر</th>
                            <th>وضعیت نمایش</th>
                            <th>تاریخ ثبت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data['comment_all'] as $comment) { ?>
                            <tr>
                                <td><?= $comment->id ?></td>
                                <td><a href="<?php $get_course = $this->model->where('courses', 'id', $comment->course_id); echo DOMAIN . '/courses/course_details/' . $get_course->id ?>" target="_blank"><?= $get_course->course_title; ?></a></td>
                                <td><?php $get_user = $this->model->where('users', 'id', $comment->user_id);
                                    echo $get_user->first_name . ' ' . $get_user->last_name ?></td>
                                <td><?= $get_user->user_email ?></td>
                                <td><?= $get_user->phone_mobile ?></td>
                                <td><?php switch ($comment->status_show) {
                                        case "show":
                                            ?>
                                            <span class="badge bg-success p-2">فعال</span>
                                            <?php break;
                                        case "hide":
                                            ?>
                                            <span class="badge bg-danger p-2">غیرفعال</span>
                                            <?php
                                            break;
                                    } ?></td>
                                <td><?= $comment->create_time ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a data-bs-toggle="modal" data-bs-target="#show-more-<?= $comment->id ?>"
                                           title="نمایش بیشتر"
                                           class="btn btn-sm btn-outline-info shadow-none"><i
                                                    class="fa-solid fa-eye"></i></a>
                                        <a href="#" title="غیرفعال"
                                           class="btn btn-sm btn-outline-secondary shadow-none"><i
                                                    class="fa-solid fa-toggle-off"></i></a>
                                        <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i
                                                    class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <!-- modal show more -->
                            <div class="modal fade" id="show-more-<?= $comment->id ?>" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">نظر کاربر</h5>
                                            <button type="button" class="btn-close shadow-none"
                                                    data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-body text-wrap text-justify">
                                                    <!-- user comment -->
                                                    <h6 class="fw-bold"><i
                                                                class="fa-solid fa-user text-muted me-2"></i><?= $get_user->first_name . ' ' . $get_user->last_name ?>
                                                    </h6>
                                                    <!-- text commennt -->
                                                    <p><?= $comment->comment_text ?></p>
                                                    <hr>
                                                    <!-- button answer -->
                                                    <a class="btn btn-primary mb-3" data-bs-toggle="collapse"
                                                       href="#answer-form">پاسخ</a>
                                                    <div class="collapse" id="answer-form">
                                                        <!-- answer form -->
                                                        <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post" class="border-form mt-2">
                                                            <div class="mb-3">
                                                <textarea class="form-control" rows="4"
                                                          placeholder="پاسخ خود را بنویسید..."></textarea>
                                                            </div>
                                                            <div class="text-end">
                                                                <button type="submit" class="btn btn-success">ثبت
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>
</div>
<!-- admin backdrop -->
<div class="admin-backdrop"></div>
