<!-- main -->
<main>
    <div class="container-fluid py-5">
        <div class="container">
            <div class="card border-0 rounded-0 box-shadow-sm">
                <div class="card-body p-0">
                    <div class="row mx-0">
                        <div class="col-12 col-lg-3 user-menu">
                            <!-- user menu -->
                            <?php
                            require_once("user-menu.php");
                            ?>
                        </div>
                        <div class="col-12 col-lg-9 user-content">
                            <h5>تغییر رمز عبور</h5>
                            <hr>
                            <!-- form -->
                            <form action="<?= currentUrl() ?>" method="post" class="border-form">
                                <div class="mb-3">
                                    <label class="mb-1">رمز عبور فعلی</label>
                                    <input type="password" id="current-password-input" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="mb-1">رمز عبور جدید</label>
                                        <input type="password" id="password-input" class="form-control">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="mb-1">تکرار رمز عبور</label>
                                        <input type="password" id="repass-input" class="form-control">
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button class="btn-orange" id="submit-button" type="button">ثبت</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    const submitBtn = $("#submit-button");
    $(document).ready(() => {
        submitBtn.click(() => {
            let currentPasswordInput = $("#current-password-input").val().trim();
            let newPasswordInput = $("#password-input").val().trim();
            let repassInput = $("#repass-input").val().trim();
            if (!empty(currentPasswordInput) && !empty(newPasswordInput) && !empty(repassInput)) {
                if (repassInput === newPasswordInput) {
                    if (validate_password(newPasswordInput)) {
                        $.post(PATH + "/account/password_edit", {
                            current_password: currentPasswordInput,
                            password: newPasswordInput,
                            re_password: repassInput
                        }, (data, status) => {
                            let obj = JSON.parse(data)
                            let message = obj.data.message
                            let status_code = obj.statusCode
                            switch (status_code) {
                                case 200:
                                    alert_success(message)
                                    setTimeout(() => location.reload(), 3000)
                                    break;
                                case 500:
                                    alert_error(message)
                                    break;
                            }
                        });
                    } else alert_error('رمز عبور قوی نیست')
                } else alert_error('رمز عبور و تکرار آن برابر نیست')
            } else {
                if (empty(currentPasswordInput)) alert_error('فیلد رمز عبور فعلی اجباری است')
                if (empty(newPasswordInput)) alert_error('فیلد رمز عبور جدید اجباری است')
                if (empty(repassInput)) alert_error('فیلد تکرار رمز عبور اجباری است')
            }
        });
    });
</script>
<?php $this->model->SessionGet('user');