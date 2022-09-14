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
                            <h5>داشبورد کاربری</h5>
                            <hr>
                            <?php require 'count_dashboard.php' ?>
                            <hr>
                            <!-- information -->
                            <div class="card bg-anti-flash-white border-0 box-shadow-sm">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-4">
                                            <p>نام و نام خانوادگی</p>
                                            <h6 class="fw-bold">محمد ابراهیمی ابراهیم بقا</h6>
                                        </div>
                                        <div class="col-12 col-md-6 mb-4">
                                            <p>ایمیل</p>
                                            <h6 class="fw-bold">mindbox@gmail.com</h6>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <p>شماره همراه</p>
                                            <h6 class="fw-bold">09151234567</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>