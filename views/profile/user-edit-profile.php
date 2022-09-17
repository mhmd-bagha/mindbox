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
                            <form action="" method="" class="border-form" id="form-edit-profile">
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="mb-1">نام</label>
                                        <input id="name-entry" type="text" class="form-control">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="mb-1">نام خانوادگی</label>
                                        <input id="family-entry" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="mb-1">شماره همراه</label>
                                        <div class="input-group">
                                            <input type="tel" id="phone-entry" class="form-control">
                                            <button class="btn shadow-none btn-outline-secondary" type="button" id="send-verify-btn" data-bs-toggle="modal" data-bs-target="#phone-number">تایید</button>
                                        </div>
                                        <!-- modal phone number -->
                                        <div class="modal fade" id="phone-number" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title">تایید شماره همراه</h6>
                                                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="" class="border-form">
                                                            <div class="mb-3">
                                                                <label class="mb-1">لطفا کد تایید ارسال شده را وارد کنید</label>
                                                                <input type="text" class=" form-control">
                                                            </div>
                                                            <div class="text-end">
                                                                <button class="btn-orange" type="submit">تایید</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="mb-1">ایمیل</label>
                                        <input type="email" id="email-entry" class="form-control" disabled value="mindbox@gmail.com">
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button class="btn-orange" type="submit" id="submit-btn">ثبت</button>
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
    
    const verifyPhoneBtn = $("#verify-phone-btn");
    const sendVerifyBtn = $("#send-verify-btn");
    const submitBtn = $("#submit-btn");
    $(document).ready(() => {
        submitBtn.click(() => {
            let name = $("#name-entry").val().trim();
            let family = $("#family-entry").val().trim();            
            let phone = $("#phone-entry").val().trim();
            let email = $("#email-entry").val().trim();
            let test = "<?php echo DOMAIN ?>";
            console.log(test);
            if (
                !empty(name) && !empty(family) &&
                !empty(phone) && !empty(email)
            ){
                edit_profile(name, family, phone, email);
            }else{
                alert_error("فیلدها نمی‌تواند خالی باشد!");
            }
            //alert(phoneNumber);
            //$.get("http://localhost/", (data, status) => {
            //    console.log("Data: " + data + ". Status: " + status);
            //});
        });
    });

    function edit_profile(name, family, phone, email){
        let PATH = "<?=DOMAIN?>";
        $.post(
            PATH + "/account/information_edit",
            {
                name: name,
                family: family,
                phone: phone,
                email: email,
            },
            (data, status) => {
                var responseByJSON = JSON.parse(data.trim());
                
                if (responseByJSON["status"] == "success"){
                    alert_success(responseByJSON["message"]);
                }else{
                    alert_error(responseByJSON["message"]);
                }

            } 
        );

    }


</script>