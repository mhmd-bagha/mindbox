<?php $get_contact = $this->model->where('information', 'information_type', 'contact_us');
if ($get_contact) $contact = json_decode($get_contact->information_data) ?>
<!-- content -->
<div class="tab-pane fade" id="tab-contact-us">
    <!-- form -->
    <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post" class="border-form"
          id="form_contact_us">
        <div class="mb-3">
            <label for="contact_us_address" class="mb-1">آدرس</label>
            <textarea rows="2" class="form-control" id="contact_us_address"><?= $get_contact ? $contact->address : '' ?></textarea>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 mb-3">
                <label for="contact_us_phone_mobile" class="mb-1">شماره تلفن</label>
                <input type="tel" class="form-control" id="contact_us_phone_mobile" value="<?= $get_contact ? $contact->phone_mobile : '' ?>">
            </div>
            <div class="col-12 col-md-6 mb-3">
                <label for="contact_us_email" class="mb-1">ایمیل</label>
                <input type="email" class="form-control" id="contact_us_email" value="<?= $get_contact ? $contact->email : '' ?>">
            </div>
        </div>
        <div class="text-end">
            <button type="button" class="btn btn-success py-2 px-5" id="btn_contact_us">ثبت</button>
        </div>
    </form>
</div>
<script>
    var form_contact_us = $("#form_contact_us input textarea button")
    var btn_contact_us = $("#btn_contact_us")
    $(document).ready(() => {
        btn_contact_us.click(() => {
            var contact_us_address = $("#contact_us_address").val().trim()
            var contact_us_phone_mobile = $("#contact_us_phone_mobile").val().trim()
            var contact_us_email = $("#contact_us_email").val().trim()
            if (!empty(contact_us_address) && !empty(contact_us_phone_mobile) && !empty(contact_us_email)) {
                add_contact_us(contact_us_address, contact_us_phone_mobile, contact_us_email)
            } else {
                if (empty(contact_us_address))
                    alert_error('فیلد آدرس اجباری است')
                if (empty(contact_us_phone_mobile))
                    alert_error('فیلد شماره تلفن اجباری است')
                if (empty(contact_us_email))
                    alert_error('فیلد ایمیل اجباری است')
            }
        })

        function add_contact_us(address, phone_mobile, email) {
            btn_contact_us.text('در حال ثبت...')
            form_contact_us.prop('disabled', true)
            $.ajax({
                url: PATH + "/admin_information/add_contact_us",
                type: "POST",
                data: {address: address, phone_mobile: phone_mobile, email: email, btn_contact_us: true},
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
                    form_contact_us.prop('disabled', false)
                    btn_contact_us.text('ثبت')
                }
            }).done(() => {
                btn_contact_us.text('ثبت')
                form_contact_us.prop('disabled', false)
            })
        }
    })
</script>