<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تماس با ما</title>
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
    <!-- contact us -->
    <div class="container-fluid bg-anti-flash-white py-5">
        <div class="container">
            <div class="card shadow rounded-0">
                <div class="card-body p-0">
                    <div class="row mx-0">
                        <!-- information -->
                        <div class="col-12 col-lg-5 col-xl-4 p-4 p-sm-5 text-white bg-blue">
                            <h4 class="fw-bold">اطلاعات تماس</h4>
                            <hr class="pb-2">
                            <ul class="list-unstyled">
                                <li class="py-3 fs-5"><i class="fa-solid fa-map-location-dot me-2"></i>استان خراسان رضوی، مشهد، بلوار احمدآباد، خیابان عارف، عارف 10، پلاک 20، واحد 5، شرکت مایندباکس</li>
                                <li class="py-3 fs-5"><i class="fa-solid fa-phone me-2"></i>09051234567</li>
                                <li class="py-3 fs-5"><i class="fa-solid fa-envelope me-2"></i>info@mindbox.com</li>
                            </ul>
                        </div>
                        <!-- form contact us -->
                        <div class="col-12 col-lg-7 col-xl-8 p-4 p-sm-5">
                            <h4 class="fw-bold">تماس با ما</h4>
                            <hr class="pb-2">
                            <form action="" method="" class="border-form">
                                <div class="mb-3">
                                    <label class="mb-1">نام و نام خانوادگی</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="mb-1">شماره تماس</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="mb-1">ایمیل</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1">متن پیام</label>
                                    <textarea rows="5" class="form-control "></textarea>
                                </div>
                                <div class="text-end pt-4">
                                    <a class="btn-orange">ارسال پیام</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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