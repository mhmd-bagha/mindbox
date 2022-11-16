<main>
    <!-- register -->
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
                        <h3 class="fw-bold"><i class="fa-solid fa-caret-left me-2"></i>ثبت نام در <?= SITE_NAME_FA ?>
                        </h3>
                    </div>
                    <hr class="my-4">
                    <!-- form -->
                    <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post"
                          class="border-form" id="form_register">
                        <div class="mb-3">
                            <label for="first_name" class="mb-1">نام</label>
                            <input type="text" class="form-control" id="first_name" placeholder="علی">
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="mb-1">نام خانوادگی</label>
                            <input type="text" class="form-control" id="last_name" placeholder="مرادی">
                        </div>
                        <div class="mb-3">
                            <label for="phone_mobile" class="mb-1">شماره همراه</label>
                            <input type="tel" class="form-control" id="phone_mobile" placeholder="09151234567">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="mb-1">ایمیل</label>
                            <input type="email" class="form-control" id="email" placeholder="example@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="mb-1">رمزعبور</label>
                            <input type="password" class="form-control" id="password" placeholder="********">
                        </div>
                        <div class="mb-3">
                            <label for="re_password" class="mb-1">تکرار رمزعبور</label>
                            <input type="password" class="form-control" id="re_password" placeholder="********">
                        </div>
                        <div class="mb-3">
                            <label class="mb-1">کپچا</label>
                            <div class="g-recaptcha"
                                 data-sitekey="<?= KEY_RECAPTCHA ?>"></div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="<?= DOMAIN ?>/login" class="btn-transparent w-100">ورود</a>
                            <button type="button" class="btn-orange w-100" id="btn_register">ثبت نام</button>
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
    let PATH = "<?php echo DOMAIN ?>"
    let btn_register = $("#btn_register")
    let form_register_input = $("#form_register input")
    $(document).ready(() => {
        btn_register.click(() => {
            var captcha = grecaptcha.getResponse()
            let first_name = $("#first_name").val().trim()
            let last_name = $("#last_name").val().trim()
            let phone_mobile = $("#phone_mobile").val().trim()
            let email = $("#email").val().trim()
            let password = $("#password").val().trim()
            let re_password = $("#re_password").val().trim()
            if (!empty(first_name) && !empty(last_name) && !empty(phone_mobile) && !empty(email) && !empty(password) && !empty(re_password)) {
                if (validate_email(email)) {
                    if (password === re_password) {
                        if (validate_password(password)) {
                            register(first_name, last_name, phone_mobile, email, password, re_password, captcha)
                        } else {
                            alert_error('یک رمز عبور قوی بنویسید')
                        }
                    } else {
                        alert_error('رمز عبور و تکرار آن برابر نیست')
                    }
                } else {
                    alert_error('ایمیل نامعتبر است')
                }
            } else {
                if (empty(first_name))
                    alert_error('لطفا فیلد نام را پر کنید')
                if (empty(last_name))
                    alert_error('لطفا فیلد نام خانوادگی را پر کنید')
                if (empty(phone_mobile))
                    alert_error('لطفا فیلد شماره همراه را پر کنید')
                if (empty(email))
                    alert_error('لطفا فیلد ایمیل را پر کنید')
                if (empty(password))
                    alert_error('لطفا فیلد رمز عبور را پر کنید')
                if (empty(re_password))
                    alert_error('لطفا فیلد تکرار رمز عبور را پر کنید')
            }
        })
    })

    function register(first_name, last_name, phone_mobile, email, password, re_password, captcha) {
        var back_url
        btn_register.text('در حال بررسی...').prop('disabled', true).addClass('disabled pointer-events btn_dot-flashing')
        form_register_input.prop('disabled', true)
        <?php if (isset($_GET['back'])){ ?>
        back_url = "<?= $_GET['back'] ?>";
        <?php }else{ ?>
        back_url = "";
        <?php } ?>
        $.ajax({
            url: PATH + "/register/Register",
            type: "POST",
            data: {
                first_name: first_name,
                last_name: last_name,
                phone_mobile: phone_mobile,
                email: email,
                password: password,
                re_password: re_password,
                captcha: captcha,
                btn_user_register: true
            },
            success: (data) => {
                let obj = JSON.parse(data)
                let message = obj.data.message
                let status_code = obj.statusCode
                switch (status_code) {
                    case 200:
                        if (!empty(back_url)) {
                            window.location.href = back_url
                        } else {
                            window.location.href = PATH + '/account/'
                        }
                        break;
                    case 500:
                        alert_error(message)
                        btn_register.text('ثبت نام').prop('disabled', false)
                        form_register_input.prop('disabled', false)
                        break;
                }
            },
            error: () => {
                btn_register.text('ثبت نام').prop('disabled', false).removeClass('disabled pointer-events btn_dot-flashing')
                form_register_input.prop('disabled', false)
                alert_error('خطا در برقراری ارتباط با سرور')
            }
        })
    }


    // function timer(remaining) {
    //     let timerOn = true
    //     let m = Math.floor(remaining / 60);
    //     let s = remaining % 60;
    //     m = m < 10 ? '0' + m : m;
    //     s = s < 10 ? '0' + s : s;
    //     document.getElementById('remaining_time').innerHTML = ' زمان باقیمانده ' + m + ':' + s;
    //     remaining -= 1;
    //     if (remaining >= 0 && timerOn) {
    //         setTimeout(() => {
    //             timer(remaining);
    //         }, 1000)
    //         return
    //     }
    //     if (!timerOn) {
    //         return;
    //     }
    // }
</script>