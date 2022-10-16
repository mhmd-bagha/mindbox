<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?= DOMAIN ?>/public/css/bootstrap.rtl.min.css">
    <!--  bootstrap icons  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <?php
    if (!empty($this->links_path))
        foreach ($this->links_path as $link_path) {
            if (!empty($link_path)) {
                if (file_exists("public/{$link_path}")) {
                    echo "<!-- " . explode('/', $link_path)[1] . " -->";
                    ?>
                    <link rel="stylesheet" href="<?php echo DOMAIN ?>/public/<?= $link_path ?>">
                    <?php
                }
            }
        }
    ?>
    <!-- css  -->
    <link rel="stylesheet" href="<?= DOMAIN ?>/public/css/styles.css">
    <!--  Jquery  -->
    <script src="<?= DOMAIN ?>/public/js/jquery-3.6.0.min.js"></script>
    <script src="<?= DOMAIN ?>/public/js/setting.js"></script>
    <!--  SEO  -->
    <meta name="author" content="<?= $this->author ?>"/>
    <meta name="keywords" content="<?= $this->keywords ?>"/>
    <meta name="description" content="<?= $this->description ?>"/>
    <meta name="robots" content="<?= $this->robots ?>"/>
    <title><?= $this->title ?></title>
</head>
<body <?php if (!empty($this->body_class)): ?>class="<?= $this->body_class ?>"<?php endif; ?>>