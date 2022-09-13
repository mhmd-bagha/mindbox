<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نتیجه پرداخت</title>
    <!-- css -->
    <link rel="stylesheet" href="../../public/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>

<body>
    <!-- header -->
    <?php
    require_once("header.php");
    ?>
    <!-- payment result -->
    <div class="container-fluid py-5">
        <div class="container">
            <!-- Successful payment -->
            <div class="card shadow w-lg-50 mx-auto">
                <div class="card-header bg-blue text-center p-4">
                    <img src="../../public/images/pubilc-images/svg/success.svg" alt="" width="150">
                    <h2 class="text-white fw-bold pb-2">پرداخت موفق !</h2>
                    <h6 class="text-white">کاربر گرامی پرداخت شما موفق بود.</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between fs-6 py-2">
                        <span class="text-muted">مبلغ</span>
                        <span class="fw-bold">450,000 تومان</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fs-6 py-2">
                        <span class="text-muted">کد رهگیری</span>
                        <span class="fw-bold">336060088203</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fs-6 py-2">
                        <span class="text-muted">تاریخ و ساعت</span>
                        <span class="fw-bold">1401/05/16 22:38:15</span>
                    </div>
                </div>
                <div class="card-footer d-grid">
                    <a href="#" class="btn-blue">بازگشت به صفحه اصلی</a>
                </div>
            </div>
            <br>
            <br>
            <!-- Payment failed -->
            <div class="card shadow w-lg-50 mx-auto">
                <div class="card-header bg-blue text-center p-4">
                    <img src="../../public/images/pubilc-images/svg/failed.svg" alt="" width="150">
                    <h3 class="fw-bold text-white">پرداخت ناموفق !</h3>
                    <h6 class="text-white">کاربر گرامی پرداخت شما ناموفق بود.</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between fs-6 py-2">
                        <span class="text-muted">مبلغ</span>
                        <span class="fw-bold">450,000 تومان</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fs-6 py-2">
                        <span class="text-muted">تاریخ و ساعت</span>
                        <span class="fw-bold">1401/05/16 22:38:15</span>
                    </div>
                    <hr>
                    <div class="text-center">
                        <span class="d-block fw-bold">توجه</span>
                        <span class="d-block">مشکلی در عملیات پرداخت رخ داد! لطفا مجددا تلاش کنید.</span>
                        <span class="d-block">در صورتی که نتیجه همچنان در حالت "پرداخت ناموفق" باقی ماند، قبل از اقدام مجدد، با مدیر سایت <a href="#">تماس</a> بگیرید.</span>
                    </div>
                </div>
                <div class="card-footer d-grid">
                    <a href="#" class="btn-blue">بازگشت به صفحه اصلی</a>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <?php
    require_once("footer.php");
    ?>
    <!-- js -->
    <script src="../../public/js/jquery-3.6.0.min.js"></script>
    <script src="../../public/js/popper.min.js"></script>
    <script src="../../public/js/bootstrap.min.js"></script>
    <!-- fontawesome js -->
    <script src="../../public/js/fontawesome.js"></script>
</body>

</html>