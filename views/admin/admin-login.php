<!-- admin login -->
<main>
    <div class="container">
        <div class="row align-items-center vh-100">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto">
                <div class="text-center">
                    <p class="admin-logo"><span>پنل<span>مدیریتی</span></span></p>
                </div>
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="text-center">
                            <h6 class="fw-bold">ورود</h6>
                        </div>
                        <hr>
                        <!-- form -->
                        <form action="<?= DOMAIN ?>/admin/login_admin" method="post" id="form_login" class="border-form">
                            <div class="mb-3">
                                <label class="mb-1">ایمیل</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label class="mb-1">رمز عبور</label>
                                <input type="password" class="form-control" id="password">
                            </div>
                            <div class="d-grid">
                                <button type="button" class="btn-blue" id="btn_login">ورود</button>
                            </div>
                        </form>
                        <!-- Modal -->
                        <div class="modal fade" id="modal_register" tabindex="-1" aria-labelledby="modal_register_title" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="alert alert-danger">
                                            توجه داشته باشید که این نام در دسترس عموم قرار میگیرد و در حال حاظر غیر قابل ویرایش است.
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= DOMAIN ?>/admin/register_admin" method="post" id="form_register" class="border-form">
                                            <div class="mb-3">
                                                <label class="mb-1">نام</label>
                                                <input type="text" class="form-control" id="first_name">
                                            </div>
                                            <div class="mb-3">
                                                <label class="mb-1">نام خانوادگی</label>
                                                <input type="text" class="form-control" id="last_name">
                                            </div>
                                            <div class="d-grid">
                                                <button type="button" class="btn-blue" id="btn_register">ثبت نام</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <p class="text-muted">آی‌پی کنونی شما <?= $_SERVER['REMOTE_ADDR'] ?> است، آی‌پی شما برای ورود در سیستم ما ثبت و بررسی میشود میشود</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    var PATH = "<?= DOMAIN ?>"
    var inputs_form_login = $("#form_login input")
    var inputs_form_register = $("#form_register input")
    var btn_login = $("#btn_login")
    var btn_register = $("#btn_register")
    var modal_register = $("#modal_register")
    $(document).ready(() => {
        btn_login.click(() => {
            var email_input = $("#email").val().trim()
            var password_input = $("#password").val().trim()
            login(email_input, password_input)
        })
        btn_register.click(() => {
            var first_name_input = $("#first_name").val().trim()
            var last_name_input = $("#last_name").val().trim()
            var email_input = $("#email").val().trim()
            var password_input = $("#password").val().trim()
            register(first_name_input, last_name_input, email_input, password_input)
        })
    })

    function login(email, password) {
        inputs_form_login.prop('disabled', true)
        btn_login.prop('disabled', true)
        replace_text('در حال بررسی...', '#btn_login')
        $.ajax({
            url: PATH + "/admin/login_admin",
            type: "POST",
            data: {
                email: email,
                password: password,
                btn_login_admin: true
            },
            success: (data) => {
                let obj = JSON.parse(data)
                let status = obj.statusCode
                let message = obj.data.message
                switch (status) {
                    case 200:
                        var redirect = obj.data.redirect
                        window.location.href = redirect
                        break;
                    case 201:
                        modal_register.modal('show')
                        break;
                    case 500:
                        alert_error(message)
                        break;
                }
            },
            error: () => {
                alert_error()
            }
        }).done(() => {
            inputs_form_login.prop('disabled', false)
            replace_text('ورود', '#btn_login')
            btn_login.prop('disabled', false)
        })
    }

    function register(first_name, last_name, email, password) {
        inputs_form_register.prop('disabled', true)
        btn_register.prop('disabled', true)
        replace_text('در حال بررسی...', '#btn_register')
        $.ajax({
            url: PATH + "/admin/register_admin",
            type: "POST",
            data: {
                first_name: first_name,
                last_name: last_name,
                email: email,
                password: password,
                btn_register_admin: true
            },
            success: (data) => {
                let obj = JSON.parse(data)
                let status = obj.statusCode
                let message = obj.data.message
                switch (status) {
                    case 200:
                        var redirect = obj.data.redirect
                        window.location.href = redirect
                        break;
                    case 500:
                        alert_error(message)
                        break;
                }
            },
            error: () => {
                alert_error()
            }
        }).done(() => {
            inputs_form_register.prop('disabled', false)
            replace_text('ثبت نام', '#btn_register')
            btn_register.prop('disabled', false)
        })
    }
</script>