
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
                    <h5>تخفیف ها</h5>
                    <a data-bs-toggle="modal" data-bs-target="#form" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>ایجاد کردن</a>
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
                                    <th>درصد تخفیف</th>
                                    <th>دوره ها</th>
                                    <th>تاریخ شروع</th>
                                    <th>تاریخ پایان</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>40٪</td>
                                    <td><span class="badge bg-warning p-2">مشاهده دوره های تخفیف دار در نمایش بیشتر</span></td>
                                    <td>1401/05/06</td>
                                    <td>1401/05/08</td>
                                    <td>
                                        <div class="btn-group">
                                            <a data-bs-toggle="modal" data-bs-target="#show-more" title="نمایش بیشتر" class="btn btn-sm btn-outline-info shadow-none"><i class="fa-solid fa-eye"></i></a>
                                            <a data-bs-toggle="modal" data-bs-target="#form" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>18٪</td>
                                    <td><span class="badge bg-warning p-2">مشاهده دوره های تخفیف دار در نمایش بیشتر</span></td>
                                    <td>1401/01/10</td>
                                    <td>1401/01/12</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="نمایش بیشتر" class="btn btn-sm btn-outline-info shadow-none"><i class="fa-solid fa-eye"></i></a>
                                            <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>75٪</td>
                                    <td><span class="badge bg-warning p-2">مشاهده دوره های تخفیف دار در نمایش بیشتر</span></td>
                                    <td>1401/03/16</td>
                                    <td>1401/03/17</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" title="نمایش بیشتر" class="btn btn-sm btn-outline-info shadow-none"><i class="fa-solid fa-eye"></i></a>
                                            <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- modal show more -->
                <div class="modal fade" id="show-more" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">دوره های تخفیف دار</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body discounted-courses">
                                <ul>
                                    <li class="text-truncate"><a href="#">دوره عادت های اتمی</a></li>
                                    <li class="text-truncate"><a href="#">دوره اَبَر مغز</a></li>
                                    <li class="text-truncate"><a href="#">دوره دیسپنزا</a></li>
                                    <li class="text-truncate"><a href="#">دوره سحرخیزی پلاس</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal edit & add -->
                <div class="modal fade" id="form" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">تخفیف</h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form action="" method="" class="border-form">
                                    <div class="mb-3">
                                        <label for="" class="mb-1">درصد تخفیف</label>
                                        <input type="tel" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="mb-1">دوره ها</label>
                                        <select id="select_courses" multiple>
                                            <option>همه دوره ها</option>
                                            <option>دوره عاذت های اتمی</option>
                                            <option>دوره سحرخیزی پلاس</option>
                                            <option>دوره دیسپنزا</option>
                                            <option>دوره اَبَر مغز</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="mb-1">تاریخ شروع</label>
                                        <input type="text" class="form-control date">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="mb-1">تاریخ پایان</label>
                                        <input type="text" class="form-control date">
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
  
    <!-- script -->
    <script type="text/javascript">
        // date picker
        $(document).ready(function() {
            $('.date').persianDatepicker({
                format: 'YYYY/MM/DD'
            });
        });
    </script>