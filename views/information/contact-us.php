<main>
    <!-- contact us -->
    <div class="container-fluid bg-anti-flash-white py-5">
        <div class="container">
            <div class="card shadow rounded-0">
                <div class="card-body p-0">
                    <div class="row mx-0">
                        <?php if (!empty($data['contact_us'])) {
                            $contact_us = json_decode($data['contact_us']->information_data); ?>
                            <!-- information -->
                            <div class="col-12 col-lg-5 col-xl-4 p-4 p-sm-5 text-white bg-blue">
                                <h4 class="fw-bold">اطلاعات تماس</h4>
                                <hr class="pb-2">
                                <ul class="list-unstyled">
                                    <li class="py-3 fs-5"><i
                                                class="fa-solid fa-map-location-dot me-2"></i><?= $contact_us->address ?>
                                    </li>
                                    <li class="py-3 fs-5"><i
                                                class="fa-solid fa-phone me-2"></i><?= $contact_us->phone_mobile ?></li>
                                    <li class="py-3 fs-5"><i
                                                class="fa-solid fa-envelope me-2"></i><?= $contact_us->email ?></li>
                                </ul>
                            </div>
                        <?php } ?>
                        <!-- form contact us -->
                        <div class="col-12 col-lg-7 col-xl-8 p-4 p-sm-5">
                            <h4 class="fw-bold">تماس با ما</h4>
                            <hr class="pb-2">
                            <form action="<?= htmlspecialchars(currentUrl()) ?>" method="post" class="border-form"
                                  id="form_contact_us">
                                <div class="mb-3">
                                    <label class="mb-1">نام و نام خانوادگی</label>
                                    <input type="text" class="form-control" id="full_name">
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="mb-1">شماره تماس</label>
                                            <input type="tel" class="form-control" id="phone_mobile">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="mb-1">ایمیل</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1">متن پیام</label>
                                    <textarea rows="5" class="form-control" id="message"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">کپچا</label>
                                    <div class="g-recaptcha"
                                         data-sitekey="<?= KEY_RECAPTCHA ?>"></div>
                                </div>
                                <div class="text-end pt-4">
                                    <button type="button" class="btn-orange" id="btn_send_message">ارسال پیام</button>
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
    var btn_send_message = $("#btn_send_message")
    var form_contact_us = $("#form_contact_us input, #form_contact_us textarea")
    var PATH = "<?= DOMAIN ?>"
    $(document).ready(() => {
        btn_send_message.click(() => {
            var captcha = grecaptcha.getResponse()
            var full_name = $("#full_name").val().trim()
            var phone_mobile = $("#phone_mobile").val().trim()
            var email = $("#email").val().trim()
            var message = $("#message").val().trim()
            if (!empty(full_name) && !empty(phone_mobile) && !empty(email) && !empty(message)) {
                if (validate_email(email)) {
                    send_message_contact(full_name, phone_mobile, email, message, captcha)
                } else alert_error('فرمت ایمیل نامعتبر است')
            } else {
                if (empty(full_name)) alert_error('فیلد نام و نام خانوادگی اجباری است')
                if (empty(phone_mobile)) alert_error('فیلد شماره تلفن اجباری است')
                if (empty(email)) alert_error('فیلد ایمیل اجباری است')
                if (empty(message)) alert_error('فیلد متن پیام اجباری است')
            }
        })
    })

    function send_message_contact(full_name, phone_mobile, email, message, captcha) {
        btn_send_message.text('در حال بررسی...').addClass('disabled btn_dot-flashing pointer-events').prop('disabled', true)
        form_contact_us.prop('disabled', true)
        $.ajax({
            url: PATH + "/information/email_contact",
            type: "POST",
            data: {full_name: full_name, phone_mobile: phone_mobile, email: email, message: message, captcha: captcha},
            success: (data) => {
                let obj = JSON.parse(data)
                let message = obj.data.message
                let status_code = obj.statusCode
                switch (status_code) {
                    case 200:
                        var redirect = obj.data.redirect
                        alert_success(message)
                        setTimeout(() => location.href = redirect, 3000)
                        break;
                    case 500:
                        alert_error(message)
                        break;
                }
            },
            error: () => alert_error('خطا در ارسال پیام'),
        }).done(() => {
            btn_send_message.text('ارسال پیام').removeClass('disabled btn_dot-flashing pointer-events').prop('disabled', false)
            form_contact_us.prop('disabled', false)
        })
    }
</script>