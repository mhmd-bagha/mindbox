<!-- content -->
<div class="tab-pane fade" id="tab-about-us">
    <!-- form -->
    <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post" class="border-form"
          id="form_about_me">
        <div class="col-12 col-md-6 col-xl-4 mb-3">
            <label for="about_me_title" class="mb-1">عنوان</label>
            <input type="text" class="form-control" id="about_me_title">
        </div>
        <div class="mb-3">
            <label for="about_me_description" class="mb-1">متن</label>
            <textarea class="form-control" id="about_me_description"></textarea>
        </div>
        <div class="text-end">
            <button type="button" class="btn btn-success" id="btn_about_me">ثبت</button>
        </div>
    </form>
</div>
<script>
    var form_about_me = $("#form_about_me input textarea button")
    var btn_about_me = $("#btn_about_me")
    $(document).ready(() => {
        btn_about_me.click(() => {
            var about_title = $("#about_me_title").val().trim()
            var about_description = $("#about_me_description").val().trim()
            if (!empty(about_title) && !empty(about_description)) {
                add_about_me(about_title, about_description)
            } else {
                if (empty(about_title))
                    alert_error('فیلد عنوان اجباری است')
                if (empty(about_description))
                    alert_error('فیلد متن اجباری است')
            }
        })

        function add_about_me(title, description) {
            btn_about_me.text('در حال ثبت...')
            form_about_me.prop('disabled', true)
            $.ajax({
                url: PATH + "/admin_information/add_about_me",
                type: "POST",
                data: {title: title, description: description, btn_about_me: true},
                success: (data) => {
                    let obj = JSON.parse(data)
                    let message = obj.data.message
                    let status_code = obj.statusCode
                    switch (status_code) {
                        case 200:
                            alert_success(message)
                            setTimeout(() => {
                                window.location.href = obj.data.redirect
                            }, 3000)
                            break;
                        case 500:
                            alert_error(message)
                            form_rule.prop('disabled', false)
                            break;
                    }
                },
                error: () => {
                    alert_error('خطا در ثبت اطلاعات')
                    form_about_me.prop('disabled', false)
                    btn_about_me.text('ثبت')
                }
            }).done(() => {
                btn_about_me.text('ثبت')
                form_about_me.prop('disabled', false)
            })
        }
    })
</script>