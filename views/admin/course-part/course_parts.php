<!-- card -->
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <!-- table -->
        <table id="table" class="table table-borderless table-striped table-hover text-center">
            <thead class="table-dark text-nowrap sticky-top">
            <tr>
                <th>#</th>
                <th>فایل دوره</th>
                <th>عنوان فایل</th>
                <th>مدت زمان فایل</th>
                <th>نوع فایل</th>
                <th>ترتیب شماره</th>
                <th>نام دوره</th>
                <th>وضعیت نمایش</th>
                <th>تاریخ ایجاد</th>
                <th>تاریخ بروزرسانی</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['course_files'] as $course_file){ ?>
                <tr>
                    <td><?= $course_file->id ?></td>
                    <td><a href="#">دانلود</a></td>
                    <td><?= $course_file->course_title ?></td>
                    <td><?= $course_file->course_time ?></td>
                    <td><?php switch ($course_file->course_type){
                            case "lock": echo "نقدی"; break;
                            case "free": echo "رایگان"; break;
                        }?></td>
                    <td><?= $course_file->number_part ?></td>
                    <td><?= $get_name_course = $this->model->where('courses', 'id', $course_file->course_id)->course_title ?></td>
                    <td><?php switch ($course_file->status_show) {
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
                    <td><?= $course_file->create_time ?></td>
                    <td><?php switch ($course_file->update_time) {
                            case !null:
                                echo $course_file->update_time;
                                break;
                            case null:
                                echo 'بدون بروزرسانی';
                                break;
                        } ?></td>
                    <td>
                        <div class="btn-group">
                            <?php switch ($course_file->status_show) {
                                case "hide":
                                    ?>
                                    <a href="#" title="غیرفعال"
                                       class="btn btn-sm btn-outline-secondary shadow-none"
                                       onclick="enable('<?= $course_file->id ?>', 'آیا میخواهید این فایل را را فعال کنید؟', 'course_files')"><i
                                            class="fa-solid fa-toggle-off"></i></a>
                                    <?php break;
                                case "show": ?>
                                    <a href="#" title="فعال"
                                       class="btn btn-sm btn-outline-success shadow-none"
                                       onclick="disable('<?= $course_file->id ?>', 'آیا میخواهید این فایل را غیر فعال کنید؟', 'course_files')"><i
                                            class="fa-solid fa-toggle-on"></i></a>
                                    <?php break;
                            } ?>
                            <a href="#" title="ویرایش" class="btn btn-sm btn-outline-primary shadow-none"><i
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