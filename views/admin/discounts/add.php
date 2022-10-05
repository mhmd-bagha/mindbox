<!-- modal edit & add -->
<div class="modal fade" id="form" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تخفیف</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-start">
                <form action="<?= htmlspecialchars(currentUrl()) ?>" method="post" class="border-form"
                      id="form_discount">
                    <div class="mb-3">
                        <label for="discount" class="mb-1">درصد تخفیف</label>
                        <input type="tel" class="form-control" id="discount">
                    </div>
                    <div class="mb-3">
                        <label for="select_courses" class="mb-1">دوره ها</label>
                        <select id="select_courses" multiple>
                            <?php foreach ($data['get_courses'] as $course) { ?>
                                <option value="<?= $course->id ?>"><?= $course->course_title ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="time_start" class="mb-1">تاریخ شروع</label>
                        <input type="text" class="form-control date" id="time_start">
                    </div>
                    <div class="mb-3">
                        <label for="time_end" class="mb-1">تاریخ پایان</label>
                        <input type="text" class="form-control date" id="time_end">
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-success py-2 px-5" id="btn_discount">ثبت</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var btn_discount = $("#btn_discount")
    var form_discount = $("#form_discount input")
    $(document).ready(() => {
        btn_discount.click(() => {
            var discount = $("#discount").val().trim()
            var select_courses = $("#select_courses").val()
            var time_start = $("#time_start").val().trim()
            var time_end = $("#time_end").val().trim()
            if (!empty(discount) && !empty(select_courses) && !empty(time_start) && !empty(time_end))
                discount_add(discount, select_courses, time_start, time_end)
            else {
                if (empty(discount)) alert_error('فیلد درصد تخفیف اجباری است')
                if (empty(select_courses)) alert_error('فیلد دوره ها اجباری است')
                if (empty(time_start)) alert_error('فیلد تاریخ شروع اجباری است')
                if (empty(time_end)) alert_error('فیلد تاریخ پایان اجباری است')
            }
        })
    })

    function discount_add(discount, courses, time_start, time_end) {
        btn_discount.prop('disabled', true).text('در حال ثبت...')
        form_discount.prop('disabled', true)
        $.ajax({
            url: PATH + "/admin_discounts/add",
            type: "POST",
            data: {
                discount: discount,
                courses: courses,
                time_start: time_start,
                time_end: time_end,
                $author: admin_id,
                btn_discount: true
            },
            success: (data) => {
                let obj = JSON.parse(data)
                let message = obj.data.message
                let status_code = obj.statusCode
                switch (status_code) {
                    case 200:
                        alert_success(message)
                        setTimeout(() => {
                            location.reload()
                        }, 3000)
                        break;
                    case 500:
                        alert_error(message)
                        break;
                }
            },
            error: () => {
                alert_error('خطا در افزودن تخفیف')
            },
        }).done(() => {
            btn_discount.prop('disabled', false).text('ثبت')
            form_discount.prop('disabled', false)
        })
    }
</script>