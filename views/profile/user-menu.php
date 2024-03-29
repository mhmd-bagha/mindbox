<div class="mb-3">
    <div class="d-flex align-items-center mb-3">
        <img src="<?php echo DOMAIN ?>/public/images/profile/user.svg" alt="">
        <span class="text-truncate">محمد ابراهیمی ابراهیم بقا</span>
    </div>
    <div class="d-flex justify-content-between">
        <span>کیف پول</span>
        <span>0 تومان</span>
    </div>
</div>
<!-- menu -->
<?php
$url_active_user = explode('/', $_SERVER['QUERY_STRING'])[1];

switch ($url_active_user){
    case null:
        $index =  "active";
        break;

        case "user_edit_profile":
        $edit_profile =  "active";
        break;

        case "user_change_password":
        $change_password =  "active";
        break;

        case "user_wallet":
        $wallet =  "active";
        break;

        case "user_my_courses":
        $my_courses =  "active";
        break;

        case "user_factors":
        $factors =  "active";
        break;

        case "user_tickets" || "user_ticket":
        $tickets =  "active";
        break;
}
?>
<ul>
    <li class="<?php echo $index ?>">
        <a href="<?php echo DOMAIN ?>/account/">
            <span class="menu-icon"><i class="bi bi-speedometer2"></i></span>
            <span class="menu-text text-truncate">داشبورد کاربری</span>
        </a>
    </li>
    <li class="<?php echo $edit_profile ?>">
        <a href="<?php echo DOMAIN ?>/account/user_edit_profile">
            <span class="menu-icon"><i class="bi bi-person"></i></span>
            <span class="menu-text text-truncate">ویرایش پروفایل</span>
        </a>
    </li>
    <li class="<?php echo $change_password ?>">
        <a href="<?php echo DOMAIN ?>/account/user_change_password">
            <span class="menu-icon"><i class="bi bi-shield-lock"></i></span>
            <span class="menu-text text-truncate">تغییر رمز عبور</span>
        </a>
    </li>
    <li class="<?php echo $wallet ?>">
        <a href="<?php echo DOMAIN ?>/account/user_wallet">
            <span class="menu-icon"><i class="bi bi-wallet"></i></span>
            <span class="menu-text text-truncate">کیف پول</span>
        </a>
    </li>
    <li class="<?php echo $my_courses ?>">
        <a href="<?php echo DOMAIN ?>/account/user_my_courses">
            <span class="menu-icon"><i class="bi bi-display"></i></span>
            <span class="menu-text text-truncate">دوره های من</span>
        </a>
    </li>
    <li class="<?php echo $factors ?>">
        <a href="<?php echo DOMAIN ?>/account/user_factors">
            <span class="menu-icon"><i class="bi bi-file-text"></i></span>
            <span class="menu-text text-truncate">فاکتور ها</span>
        </a>
    </li>
    <li class="<?php echo $tickets ?>">
        <a href="<?php echo DOMAIN ?>/account/user_tickets">
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