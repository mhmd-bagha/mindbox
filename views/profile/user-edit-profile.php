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
                            <h5>ویرایش پروفایل کاربری</h5>
                            <hr>
                            <!-- form -->
                            <form action="<?= htmlspecialchars(currentUrl()) ?>" method="post" class="border-form">
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="first_name" class="mb-1">نام</label>
                                        <input type="text" class="form-control" id="first_name"
                                               value="<?= $get_user->first_name ?>">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="last_name" class="mb-1">نام خانوادگی</label>
                                        <input type="text" class="form-control" id="last_name"
                                               value="<?= $get_user->last_name ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="mb-1">شماره همراه</label>
                                        <div class="input-group">
                                            <input type="tel" class="form-control disabled" disabled
                                                   value="<?= $get_user->phone_mobile ?>">
                                            <!--                                            <button class="btn shadow-none btn-outline-secondary" type="button"-->
                                            <!--                                                    data-bs-toggle="modal" data-bs-target="#phone-number">تایید-->
                                            <!--                                            </button>-->
                                        </div>
                                        <!-- modal phone number -->
                                        <div class="modal fade" id="phone-number" tabindex="-1"
                                             data-bs-backdrop="static">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title">تایید شماره همراه</h6>
                                                        <button type="button" class="btn-close shadow-none"
                                                                data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="mb-1">لطفا کد تایید ارسال شده را وارد
                                                                کنید</label>
                                                            <input type="text" class=" form-control">
                                                        </div>
                                                        <div class="text-end">
                                                            <button class="btn-orange" type="submit">تایید</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="mb-1">ایمیل</label>
                                        <input type="email" class="form-control disabled" disabled
                                               value="<?= $get_user->user_email ?>">
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button class="btn-orange" type="button" id="btn_edit_profile">ثبت</button>
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
    var btn_edit_profile = $("#btn_edit_profile")
    $(document).ready(() => {
        btn_edit_profile.click(() => {
            var first_name = $("#first_name").val().trim()
            var last_name = $("#last_name").val().trim()
            if (!empty(first_name) && !empty(last_name)) {
                edit_profile(first_name, last_name)
            } else {
                if (empty(first_name)) alert_error('فیلد نام اجباری است')
                if (empty(last_name)) alert_error('فیلد نام خانوادگی اجباری است')
            }
        })
    })

    function edit_profile(first_name, last_name) {
        btn_edit_profile.prop('disabled', true).text('در حال بررسی...').addClass('disabled pointer-events btn_dot-flashing')
        $.ajax({
            url: PATH + "/account/edit_profile",
            type: "POST",
            data: {first_name: first_name, last_name: last_name},
            success: (data) => {
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
            },
            error: () => {
                alert_error('خطا در ویرایش اطلاعات')
            },
        }).done(() => {
            btn_edit_profile.prop('disabled', false).text('ثبت').removeClass('disabled pointer-events btn_dot-flashing')
        })
    }
</script>