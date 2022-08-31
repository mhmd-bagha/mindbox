<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فراموشی رمز عبور</title>
    <!-- css -->
    <link rel="stylesheet" href="../../public/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>

<body>
    <!-- forgot passwords -->
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-12 col-lg-5 col-xl-4 d-flex flex-column justify-content-center align-items-center">
                <div class="w-75 py-5">
                    <!-- back button -->
                    <div class="pb-4">
                        <a href="../../index.php" class="btn bg-light fw-bold shadow"><i class="fa-solid fa-arrow-right pe-2"></i>بازگشت</a>
                    </div>
                    <!-- title -->
                    <div>
                        <h3 class="fw-bold"><i class="fa-solid fa-caret-left me-2"></i>فراموشی رمز عبور</h3>
                    </div>
                    <hr class="my-4">
                    <!-- form -->
                    <form action="" method="" class="border-form">
                        <div class="mb-3">
                            <label class="mb-1">کد تایید</label>
                            <input type="text" class="form-control" placeholder="کد تایید را وارد کنید">
                        </div>
                        <div class="mb-3">
                            <label class="mb-1">رمز عبور</label>
                            <input type="password" class="form-control" placeholder="********">
                        </div>
                        <div class="mb-3">
                            <label class="mb-1">تکرار رمز عبور</label>
                            <input type="password" class="form-control" placeholder="********">
                        </div>
                        <div class="d-grid">
                            <button class="btn-orange">تغییر رمز عبور</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- background image-->
            <div class="col-12 col-lg-7 col-xl-8 d-none d-lg-flex bg-login text-center d-flex flex-column justify-content-center">
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="../../public/js/jquery-3.6.0.min.js"></script>
    <script src="../../public/js/popper.min.js"></script>
    <script src="../../public/js/bootstrap.min.js"></script>
    <!-- fontawesome js -->
    <script src="../../public/js/fontawesome.js"></script>
</body>

</html>