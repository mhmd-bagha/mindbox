<?php var_dump($data); die(); ?>
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
                        <a data-bs-toggle="modal" data-bs-target="#show-more" title="نمایش بیشتر"
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
            <tr>
                <td>2</td>
                <td>18٪</td>
                <td><span class="badge bg-warning p-2">مشاهده دوره های تخفیف دار در نمایش بیشتر</span></td>
                <td>1401/01/10</td>
                <td>1401/01/12</td>
                <td>
                    <div class="btn-group">
                        <a href="#" title="نمایش بیشتر" class="btn btn-sm btn-outline-info shadow-none"><i
                                class="fa-solid fa-eye"></i></a>
                        <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i
                                class="fa-solid fa-trash"></i></a>
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
                        <a href="#" title="نمایش بیشتر" class="btn btn-sm btn-outline-info shadow-none"><i
                                class="fa-solid fa-eye"></i></a>
                        <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a href="#" title="حذف" class="btn btn-sm btn-outline-danger shadow-none"><i
                                class="fa-solid fa-trash"></i></a>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>