<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="<?php echo DOMAIN ?>/public/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- css owl -->
    <link rel="stylesheet" href="<?php echo DOMAIN ?>/public/vendor/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo DOMAIN ?>/public/vendor/owl/owl.theme.default.min.css">
    <?php
    if (!empty($this->links_name)) {
        if (file_exists(DOMAIN . "/public/vendor/{$this->links_name}")) {
            echo "<!--  links load  -->";
            foreach ($this->links_path as $link_path) {
                ?>
                <link rel="stylesheet" href="<?php echo DOMAIN ?>/public/vendor/<?= $link_path ?>">
                <?php
            }
        }
    }
    ?>
    <!--  video player  -->
    <link rel="stylesheet" href="<?php echo DOMAIN ?>/public/vendor/video-player/css/video-player.css">
    <link rel="stylesheet" href="<?php echo DOMAIN ?>/public/css/styles.css">
    <!--  Jquery  -->
    <script src="<?php echo DOMAIN ?>/public/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo DOMAIN ?>/public/js/setting.js"></script>
    <!--  SEO  -->
    <meta name="author" content="<?php echo $this->author ?>"/>
    <meta name="keywords" content="<?php echo $this->keywords ?>"/>
    <meta name="description" content="<?php echo $this->description ?>"/>
    <meta name="robots" content="<?php echo $this->robots ?>"/>
    <title><?php echo $this->title ?></title>
</head>
<body>