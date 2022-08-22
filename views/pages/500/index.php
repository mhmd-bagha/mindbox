<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خطای سرور داخلی</title>
    <!-- css -->
    <link rel="stylesheet" href="../../../public/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../public/css/styles.css">
</head>

<body>
    <!-- header -->
    <?php
    require_once("header.php");
    ?>
    <!-- page 500 -->
    <div class="container-fluid text-center pb-5">
        <div class="container">
            <img src="../../../public/images/pubilc-images/pages/500.png" alt="" class="img-fluid">
            <p class="fw-bold pb-5">خطای سرور داخلی، لطفا بعدا تلاش کنید یا با مدیر سایت <a href="#">تماس</a> بگیرید.</p>
            <a href="../../../index.php" class="btn-orange">صفحه اصلی</a>
        </div>
    </div>
    <!-- footer -->
    <?php
    require_once("footer.php");
    ?>
    <!-- js -->
    <script src="../../../public/js/jquery-3.6.0.min.js"></script>
    <script src="../../../public/js/popper.min.js"></script>
    <script src="../../../public/js/bootstrap.min.js"></script>
    <!-- fontawesome js -->
    <script src="../../../public/js/fontawesome.js"></script>
</body>

</html>