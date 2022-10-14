<!-- forgot passwords -->
<main>
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-12 col-lg-5 col-xl-4 d-flex flex-column justify-content-center align-items-center">
                <div class="w-75 py-5">
                    <div>
                        <h3 class="fw-bold"><i class="fa-solid fa-caret-left me-2"></i>فراموشی رمز عبور</h3>
                    </div>
                    <hr class="my-4">
                    <!-- form -->
                    <form action="<?= htmlspecialchars(currentUrl()) ?>" method="post" class="border-form">
                        <div class="mb-3">
                            <label class="mb-1">رمز عبور</label>
                            <input type="password" class="form-control" placeholder="********" id="password">
                        </div>
                        <div class="mb-3">
                            <label class="mb-1">تکرار رمز عبور</label>
                            <input type="password" class="form-control" placeholder="********" id="re_password">
                        </div>
                        <div class="d-grid">
                            <button type="button" class="btn-orange" id="btn_change_password">تغییر رمز عبور</button>
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
    var btn_change_password = $("#btn_change_password")
    var PATH = "<?= DOMAIN ?>"
    $(document).ready(() => {
        btn_change_password.click(() => {
            var password = $("#password").val().trim()
            var re_password = $("#re_password").val().trim()
            var auth = "<?= explode('/', $_GET['url'])[2] ?>"
            if (!empty(password) && !empty(re_password)) {
                if (password === re_password) {
                    if (validate_password(password)) {
                        change_password(password, re_password, auth)
                    } else alert_error('رمز عبور قوی نیست')
                } else alert_error('رمز عبور و تکرار آن برابر نیست')
            } else {
                if (empty(password)) alert_error('فیلد رمز عبور اجباری است')
                if (empty(re_password)) alert_error('فیلد تکرار رمز عبور اجباری است')
            }
        })
    })

    function change_password(password, re_password, auth) {
        btn_change_password.text('در حال بررسی...').addClass('disabled btn_dot-flashing pointer-events').prop('disabled', true)
        $.post(PATH + "/forgot_password/change_password", {
            password: password,
            re_password: re_password,
            auth: auth
        }, (data) => {
            let obj = JSON.parse(data)
            let message = obj.data.message
            let status_code = obj.statusCode
            switch (status_code) {
                case 200:
                    let redirect = obj.data.redirect
                    alert_success(message)
                    setTimeout(() => location.href = redirect, 3000)
                    break;
                case 500:
                    alert_error(message)
                    break;
            }
            btn_change_password.text('تغییر رمز عبور').removeClass('disabled btn_dot-flashing pointer-events').prop('disabled', false)
        })
    }
</script>