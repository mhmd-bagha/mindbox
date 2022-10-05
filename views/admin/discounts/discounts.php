<!-- card -->
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <!-- table -->
        <table id="table" class="table table-borderless table-striped table-hover text-center">
            <thead class="table-dark text-nowrap sticky-top">
            <tr>
                <th>#</th>
                <th>درصد تخفیف</th>
                <th>دوره</th>
                <th>تاریخ شروع</th>
                <th>تاریخ پایان</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['discount_all'] as $discount){
                $get_course = $this->model->where('courses', 'id', $discount->course_id); ?>
            <tr>
                <td><?= $discount->id ?></td>
                <td><?= $discount->discount ?>٪</td>
                <td><?= $get_course->course_title ?></td>
                <td><?= $discount->time_start ?></td>
                <td><?= $discount->time_end ?></td>
                <td>
                    <div class="btn-group">
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