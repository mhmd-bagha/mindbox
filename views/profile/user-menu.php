<?php $get_user = $this->model->where('users', 'user_email', $this->model->decrypt(Model::SessionGet('user'))); ?>
<div class="mb-3">
    <div class="d-flex align-items-center mb-3">
        <img src="<?php echo DOMAIN ?>/public/images/profile/user.svg" alt="تصویر پروفایل">
        <span class="text-truncate"><?= $get_user->first_name . ' ' . $get_user->last_name ?></span>
    </div>
    <div class="d-flex justify-content-between">
        <span>کیف پول</span>
        <span><?= number_format($get_user->user_money) ?> تومان</span>
    </div>
</div>
<!-- menu -->
<?php
if (isset(explode('/', $_SERVER['QUERY_STRING'])[1])) {
    $url_active_user = explode('/', $_SERVER['QUERY_STRING'])[1];
} else {
    $url_active_user = null;
}
$edit_profile_active = '';
$change_password_active = '';
$wallet_active = '';
$my_courses_active = '';
$factors_active = '';
$tickets_active = '';
$index_active = '';
switch ($url_active_user) {
    case "edit_profile":
        $edit_profile_active = "active";
        break;
    case "change_password":
        $change_password_active = "active";
        break;
    case "wallet":
        $wallet_active = "active";
        break;
    case "my_courses":
        $my_courses_active = "active";
        break;
    case "factors":
        $factors_active = "active";
        break;
    case "tickets" || "ticket" || "add_ticket":
        $tickets_active = "active";
        break;
    default:
        $index_active = "active";
        break;
}
?>
<ul>
    <li class="<?= $index_active ?>">
        <a href="<?php echo DOMAIN ?>/account/">
            <span class="menu-icon"><i class="bi bi-speedometer2"></i></span>
            <span class="menu-text text-truncate">داشبورد کاربری</span>
        </a>
    </li>
    <li class="<?= $edit_profile_active ?>">
        <a href="<?php echo DOMAIN ?>/account/edit_profile">
            <span class="menu-icon"><i class="bi bi-person"></i></span>
            <span class="menu-text text-truncate">ویرایش پروفایل</span>
        </a>
    </li>
    <li class="<?= $change_password_active ?>">
        <a href="<?php echo DOMAIN ?>/account/change_password">
            <span class="menu-icon"><i class="bi bi-shield-lock"></i></span>
            <span class="menu-text text-truncate">تغییر رمز عبور</span>
        </a>
    </li>
    <li class="<?= $wallet_active ?>">
        <a href="<?php echo DOMAIN ?>/account/wallet">
            <span class="menu-icon"><i class="bi bi-wallet"></i></span>
            <span class="menu-text text-truncate">کیف پول</span>
        </a>
    </li>
    <li class="<?= $my_courses_active ?>">
        <a href="<?php echo DOMAIN ?>/account/my_courses">
            <span class="menu-icon"><i class="bi bi-display"></i></span>
            <span class="menu-text text-truncate">دوره های من</span>
        </a>
    </li>
    <li class="<?= $factors_active ?>">
        <a href="<?php echo DOMAIN ?>/account/factors">
            <span class="menu-icon"><i class="bi bi-file-text"></i></span>
            <span class="menu-text text-truncate">فاکتور ها</span>
        </a>
    </li>
    <li class="<?= $tickets_active ?>">
        <a href="<?php echo DOMAIN ?>/account/tickets">
            <span class="menu-icon"><i class="bi bi-ticket"></i></span>
            <span class="menu-text text-truncate">تیکت ها</span>
        </a>
    </li>
    <li>
        <a href="<?php echo DOMAIN ?>/account/logout">
            <span class="menu-icon"><i class="bi bi-box-arrow-right"></i></span>
            <span class="menu-text text-truncate">خروج</span>
        </a>
    </li>
</ul>
<script>
    let PATH = "<?= DOMAIN ?>"
    let user_id = "<?= $get_user->id ?>"
</script>