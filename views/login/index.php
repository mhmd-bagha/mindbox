<main>
    <!-- login -->
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-12 col-lg-5 col-xl-4 d-flex flex-column justify-content-center align-items-center">
                <div class="w-75 py-5">
                    <!-- back button -->
                    <div class="pb-4">
                        <a href="<?php echo DOMAIN ?>" class="btn bg-light fw-bold shadow"><i
                                    class="fa-solid fa-arrow-right pe-2"></i>بازگشت</a>
                    </div>
                    <!-- title -->
                    <div>
                        <h3 class="fw-bold"><i class="fa-solid fa-caret-left me-2"></i>ورود به حساب کاربری</h3>
                    </div>
                    <hr class="my-4">
                    <!-- form -->
                    <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post" id="form_login"
                          class="border-form">
                        <div class="mb-3">
                            <label for="email" class="mb-1">ایمیل</label>
                            <input type="email" id="email" class="form-control" placeholder="example@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="mb-1">رمزعبور</label>
                            <input type="password" id="password" class="form-control" placeholder="*********">
                        </div>
                        <div class="text-end py-3">
                            <a href="<?= DOMAIN ?>/forgot_password">رمزعبور خود را فراموش کرده اید؟</a>
                        </div>
                        <div class="d-grid">
                            <button type="button" id="btn_login" class="btn-orange">ورود</button>
                        </div>
                    </form>
                    <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post"
                          class="border-form" id="form_verify_code">
                        <div class="justify-content-center align-items-center text-center mb-2">
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="#" id="btn_edited_email"><i
                                            class="fa-solid fa-pen-to-square fs-6 me-3 text-blue"></i></a>
                                <p class="fs-6 fw-bold m-0" id="email_replace"></p>
                            </div>
                            <p class="fs-6 text-muted m-0">کدی که برای ایمیل شما ارسال شد را وارد کنید</p>
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control" name="verify-code" id="verify-code"
                                   placeholder="کد تایید"/>
                        </div>
                        <div class="mb-3 row justify-content-center align-items-baseline text-center">
                            <p class="col-12 col-lg-6 fs-6 text-muted" id="remaining_time"></p>
                            <a href="#" class="col-12 col-lg-6 text-blue" id="again_send_code">ارسال دوباره کد</a>
                        </div>
                        <div class="d-grid">
                            <button type="button" class="btn-orange" id="btn_send_code">ورود</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- background image-->
            <div class="col-12 col-lg-7 col-xl-8 d-none d-lg-flex bg-login text-center d-flex flex-column justify-content-center"></div>
        </div>
    </div>
</main>
<script>
    let form_login_input = $("#form_login")
    let form_verify_code = $("#form_verify_code")
    let PATH = "<?php echo DOMAIN ?>"
    let btn_login = $("#btn_login")
    form_verify_code.hide()

    $(document).ready(() => {
        btn_login.click(() => {
            let email = $("#email").val().trim()
            let password = $("#password").val().trim()
            if (!empty(email) && !empty(password)) {
                login(email, password)
            } else {
                if (empty(email))
                    alert_error("لطفا فیلد ایمیل را پر کنید")
                if (empty(password))
                    alert_error("لطفا فیلد رمز عبور را پر کنید")
            }
        })
    })

    function login(email, password) {
        var back_url
        btn_login.text('در حال بررسی...').prop('disabled', true)
        form_login_input.prop('disabled', true)
        <?php if (isset($_GET['back'])){ ?>
        back_url = "<?= $_GET['back'] ?>";
        <?php }else{ ?>
        back_url = "";
        <?php } ?>
        $.ajax({
            url: PATH + "/login/login",
            type: "POST",
            data: {email: email, password: password, btn_login: true},
            success: (data) => {
                let obj = JSON.parse(data)
                let status = obj.statusCode
                let message = obj.data.message
                switch (status) {
                    case 200:
                        if (!empty(back_url)) {
                            window.location.href = back_url
                        } else {
                            window.location.href = PATH + '/account/'
                        }
                        break;
                    case 500:
                        alert_error(message)
                        btn_login.text('ورود').prop('disabled', false)
                        form_login_input.prop('disabled', false)
                        break;
                }
            },
            error: (err) => {
                alert_error("خطا در ارتباط با سرور")
                btn_login.text('ورود').prop('disabled', false)
                form_login_input.prop('disabled', false)
            }
        })
    }
</script>