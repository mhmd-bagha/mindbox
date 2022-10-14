<!-- forgot passwords -->
<main>
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-12 col-lg-5 col-xl-4 d-flex flex-column justify-content-center align-items-center">
                <div class="w-75 py-5">
                    <!-- back button -->
                    <div class="pb-4">
                        <a href="<?= DOMAIN ?>/login" class="btn bg-light fw-bold shadow"><i
                                    class="fa-solid fa-arrow-right pe-2"></i>بازگشت</a>
                    </div>
                    <!-- title -->
                    <div>
                        <h3 class="fw-bold"><i class="fa-solid fa-caret-left me-2"></i>فراموشی رمز عبور</h3>
                    </div>
                    <hr class="my-4">
                    <!-- form -->
                    <form action="<?= currentUrl() ?>" method="post" class="border-form">
                        <div class="mb-3">
                            <label for="email" class="mb-1">ایمیل</label>
                            <input type="email" class="form-control" id="email" placeholder="example@example.com">
                        </div>
                        <div class="d-grid">
                            <button type="button" class="btn-orange" id="btn_send_email_link">ارسال لینک تایید</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- background image-->
            <div class="col-12 col-lg-7 col-xl-8 d-none d-lg-flex bg-login text-center d-flex flex-column justify-content-center">
            </div>
        </div>
    </div>
</main>
<script>
    var btn_send_email_link = $("#btn_send_email_link")
    var PATH = "<?= DOMAIN ?>"
    $(document).ready(() => {
        btn_send_email_link.click(() => {
            var email = $("#email").val().trim()
            if (!empty(email)) {
                if (validate_email(email)) {
                    send_email_link(email)
                } else alert_error('فرمت ایمیل نامعتبر است')
            } else alert_error('فیلد ایمیل اجباری است')
        })
    })

    function send_email_link(email) {
        btn_send_email_link.text('در حال بررسی').addClass('disabled btn_dot-flashing pointer-events').prop('disabled', true)
        $.post(PATH + "/forgot_password/send_link", {email: email}, (data) => {
            let obj = JSON.parse(data)
            let message = obj.data.message
            let status_code = obj.statusCode
            switch (status_code) {
                case 200:
                    alert_success(message)
                    break;
                case 500:
                    alert_error(message)
                    break;
            }
            btn_send_email_link.text('ارسال لینک تایید').removeClass('disabled btn_dot-flashing pointer-events').prop('disabled', false)
        })
    }
</script>