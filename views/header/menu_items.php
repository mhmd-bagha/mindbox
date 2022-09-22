<?php require DIR_ROOT . '/models/model_menu.php';
$menu_items = (new model_menu())->find_all('status_show', 'show'); ?>
<div class="offcanvas-body">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" href="<?php echo DOMAIN ?>">صفحه اصلی</a>
        </li>
        <?php foreach ($menu_items as $menu_item) { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= $menu_item->menu_address ?>"><?= $menu_item->menu_name ?></a>
            </li>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo DOMAIN ?>/information">درباره ما</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo DOMAIN ?>/information/contactUs">تماس با ما</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo DOMAIN ?>/information/rules">قوانین</a>
        </li>
    </ul>
</div>