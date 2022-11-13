<!-- content -->
<div class="tab-pane fade show active" id="tab-benefits">
    <!-- form -->
    <form action="<?= htmlspecialchars(currentUrl()) ?>" method="post" class="border-form" id="form_benefits">
        <div class="mb-3">
            <div class="row">
                <div class="col-lg-6">
                    <label for="benefits_title" class="mb-1">عنوان</label>
                    <input type="text" class="form-control" id="benefits_title">
                </div>
                <div class="col-lg-6">
                    <label for="benefits_icon" class="mb-1">آیکون</label>
                    <select class="form-control form-select" id="benefits_icon">
                        <option selected disabled>انتخاب کنید...</option>
                        <option value="fa-solid fa-gears"><i class="fa-solid fa-gears"></i>تنظیمات</option>
                        <option value="fa-solid fa-people-group"><i class="fa-solid fa-people-group"></i>تیم</option>
                        <option value="fa-solid fa-headphones"><i class="fa-solid fa-headphones"></i>پشتیبانی</option>
                        <option value="fa-solid fa-chalkboard-user"><i class="fa-solid fa-chalkboard-user"></i>اساتید</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="benefits_description" class="mb-1">متن</label>
            <textarea rows="2" class="form-control" id="benefits_description"></textarea>
        </div>
        <div class="text-end">
            <button type="button" class="btn btn-success py-2 px-5" id="btn_benefits">ثبت</button>
        </div>
    </form>
</div>
<script>
    var btn_benefits = $("#btn_benefits")
    var form_benefits = $("#form_benefits input, #form_benefits textarea")
    $(document).ready(() => {
        btn_benefits.click(() => {
            var benefits_title = $("#benefits_title").val().trim()
            var benefits_description = $("#benefits_description").val().trim()
            var benefits_icon = $("#benefits_icon").val()
            if (!empty(benefits_title) && !empty(benefits_description) && !empty(benefits_icon)) {
                benefits_add(benefits_title, benefits_description, benefits_icon)
            } else {
                if (empty(benefits_title)) alert_error('فیلد عنوان اجباری است')
                if (empty(benefits_description)) alert_error('فیلد متن اجباری است')
                if (empty(benefits_icon)) alert_error('آیکون اجباری است')
            }
        })
    })

    function benefits_add(title, description, icon) {
        form_benefits.prop('disabled', true)
        btn_benefits.prop('disabled', true).text('در حال ثبت...')
        $.ajax({
            url: PATH + "/admin_information/benefits_add",
            type: "POST",
            data: {title: title, description: description, icon: icon, btn_benefits: true},
            success: (data) => {
                let obj = JSON.parse(data)
                let message = obj.data.message
                let status_code = obj.statusCode
                switch (status_code) {
                    case 200:
                        alert_success(message)
                        form_benefits.val('')
                        break;
                    case 500:
                        alert_error(message)
                        break;
                }
                form_benefits.prop('disabled', false)
                btn_benefits.prop('disabled', false).text('ثبت')
            },
            error: () => {
                alert_error('خطا در ارسال اطلاعات')
                form_benefits.prop('disabled', false)
                btn_benefits.prop('disabled', false).text('ثبت')
            }
        })
    }
</script>