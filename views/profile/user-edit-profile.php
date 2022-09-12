
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
                                <form action="" method="" class="border-form">
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label class="mb-1">نام</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label class="mb-1">نام خانوادگی</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label class="mb-1">شماره همراه</label>
                                            <div class="input-group">
                                                <input type="tel" class="form-control">
                                                <button class="btn shadow-none btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#phone-number">تایید</button>
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
                                            <input type="email" class="form-control" disabled value="mindbox@gmail.com">
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button class="btn-orange" type="submit">ثبت</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
