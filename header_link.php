<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?php echo DOMAIN ?>/public/css/bootstrap.rtl.min.css">
    <!--  bootstrap icons  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <?php
    if (!empty($this->links_path))
        foreach ($this->links_path as $link_path) {
            if (!empty($link_path)) {
                if (file_exists("public/{$link_path}")) {
                    echo "<!-- " . explode('/', $link_path)[0] . " -->";
                    ?>
                    <link rel="stylesheet" href="<?php echo DOMAIN ?>/public/vendor/<?= $link_path ?>">
                    <?php
                }
            }
        }
    ?>
    <!-- css  -->
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
<body class="<?php if (!empty($this->body_class)) echo $this->body_class ?>">