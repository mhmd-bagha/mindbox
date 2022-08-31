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
                        <h3 class="fw-bold"><i class="fa-solid fa-caret-left me-2"></i>ثبت نام در مایندباکس</h3>
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
                        <div class="d-grid">
                            <button type="button" class="btn-orange" id="btn_send_code">ارسال کد تایید</button>
                        </div>
                    </form>
                    <!--  form verify  -->
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
                            <button type="button" class="btn-orange" id="btn_send_code">تایید</button>
                        </div>
                    </form>
                    <!--  form edit email  -->
                    <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post"
                          class="border-form" id="form_edit_email">
                        <div class="mb-3">
                            <label for="edit_email">ایمیل</label>
                            <input type="tel" class="form-control" name="edit_email" id="edit_email"
                                   placeholder="example@example.com"/>
                        </div>
                        <div class="d-grid">
                            <button type="button" class="btn-orange" id="btn_edit_email">ویرایش</button>
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
    let form_verify_code = $("#form_verify_code")
    let form_register = $("#form_register")
    let form_edit_email = $("#form_edit_email")
    let btn_send_code = $("#btn_send_code")
    let btn_edit_email = $("#btn_edit_email")
    let btn_edited_email = $("#btn_edited_email")
    form_verify_code.hide()
    form_edit_email.hide()
    $(document).ready(() => {
        btn_send_code.click(() => {

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
                            register(first_name, last_name, phone_mobile, email, password, re_password)
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

        btn_edited_email.click(() => {
            form_verify_code.fadeOut(10)
            form_edit_email.fadeIn(10)
        })

        btn_edit_email.click(() => {
            form_edit_email.fadeOut(10)
            form_verify_code.fadeIn(10)
        })

    })

    function register(first_name, last_name, phone_mobile, email, password, re_password) {
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
                btn_user_register: true
            },
            success: (data) => {
                console.log(data)
                let obj = JSON.parse(data)

                let message = obj.data.message
                let status_code = obj.statusCode
                switch (status_code) {
                    case 200:
                        form_register.fadeOut()
                        form_verify_code.fadeIn()
                        timer(180)
                        replace_text(email, "#email_replace")
                        break;
                    case 500:
                        alert_error(message)
                        break;
                }
            },
            error: (err) => {
                alert_error('خطا در برقراری ارتباط با سرور')
            }
        })
    }

    function send_code_email(email) {
        $.ajax({
            url: "",
            type: "",
            dataType: "json",
            data: {email: email},
            success: (data) => {
            },
            error: (err) => {
                alert_error('خطا در برقراری ارتباط با سرور')
            }
        })
    }


    function timer(remaining) {
        let timerOn = true
        let m = Math.floor(remaining / 60);
        let s = remaining % 60;
        m = m < 10 ? '0' + m : m;
        s = s < 10 ? '0' + s : s;
        document.getElementById('remaining_time').innerHTML = ' زمان باقیمانده ' + m + ':' + s;
        remaining -= 1;
        if (remaining >= 0 && timerOn) {
            setTimeout(() => {
                timer(remaining);
            }, 1000)
            return
        }
        if (!timerOn) {
            return;
        }
    }
</script>