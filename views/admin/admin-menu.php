<?php $get_admin = $this->model->where('admins', 'admin_email', $this->model->decrypt(Model::SessionGet('admin')));
$is_update = $this->model->where('information', 'information_type', 'update');
$active_home = '';
$active_users = '';
$active_discounts = '';
$active_wallet = '';
$active_social_networks = '';
$active_categories = '';
$active_courses = '';
$active_sliders = '';
$active_comments = '';
$active_tickets = '';
$active_menus = '';
$active_pages = '';
$active_settings = '';
if (isset(explode('/', $_SERVER['QUERY_STRING'])[1])) :
    $url_active_admin = explode('/', $_SERVER['QUERY_STRING'])[1];
else:
    $url_active_admin = null;
endif;
switch ($url_active_admin) {
    case "admin":
        $active_home = "active";
        break;
    case "users":
        $active_users = "active";
        break;
    case "discounts":
        $active_discounts = "active";
        break;
    case "wallet":
        $active_wallet = "active";
        break;
    case "social_networks":
        $active_social_networks = "active";
        break;
    case "categories":
        $active_categories = "active";
        break;
    case "courses":
        $active_courses = "active";
        break;
    case "sliders":
        $active_sliders = "active";
        break;
    case "comments":
        $active_comments = "active";
        break;
    case "tickets":
        $active_tickets = "active";
        break;
    case "menus":
        $active_menus = "active";
        break;
    case "pages":
        $active_pages = "active";
        break;
        case "settings":
        $active_settings = "active";
        break;
    default:
        $active_home = "active";
        break;
}
?>
<section class="sidebar">
    <!-- sidebar header -->
    <div class="sidebar-header d-flex align-items-center">
        <img src="<?= DOMAIN ?>/public/images/profile/user.svg" alt="تصویر ادمین">
        <span class="text-truncate"><?= $get_admin->first_name . ' ' . $get_admin->last_name ?></span>
    </div>
    <!-- sidebar nav -->
    <div class="sidebar-nav">
        <ul>
            <li class="<?= $active_home ?>">
                <a href="<?= DOMAIN ?>/admin">
                    <span class="menu-icon"><i class="fa-solid fa-house"></i></span>
                    <span class="menu-text text-truncate">داشبورد</span>
                </a>
            </li>
            <li class="<?= $active_users ?>">
                <a href="<?= DOMAIN ?>/admin/users">
                    <span class="menu-icon"><i class="fa-solid fa-users"></i></span>
                    <span class="menu-text text-truncate">مدیریت کاربران</span>
                </a>
            </li>
            <li class="<?= $active_discounts ?>">
                <a href="<?= DOMAIN ?>/admin/discounts">
                    <span class="menu-icon"><i class="fa-solid fa-percent"></i></span>
                    <span class="menu-text text-truncate">مدیریت تخفیف ها</span>
                </a>
            </li>
            <li class="<?= $active_wallet ?>">
                <a href="<?= DOMAIN ?>/admin/wallet">
                    <span class="menu-icon"><i class="fa-solid fa-wallet"></i></span>
                    <span class="menu-text text-truncate">مدیریت کیف پول</span>
                </a>
            </li>
            <li class="<?= $active_social_networks ?>">
                <a href="<?= DOMAIN ?>/admin/social_networks">
                    <span class="menu-icon"><i class="fa-solid fa-share-nodes"></i></span>
                    <span class="menu-text text-truncate">مدیریت شبکه های اجتماعی</span>
                </a>
            </li>
            <li class="<?= $active_categories ?>">
                <a href="<?= DOMAIN ?>/admin/categories">
                    <span class="menu-icon"><i class="fa-solid fa-align-justify"></i></span>
                    <span class="menu-text text-truncate">مدیریت دسته بندی دوره ها</span>
                </a>
            </li>
            <li class="<?= $active_courses ?>">
                <a href="<?= DOMAIN ?>/admin/courses">
                    <span class="menu-icon"><i class="fa-solid fa-display"></i></span>
                    <span class="menu-text text-truncate">مدیریت دوره ها</span>
                </a>
            </li>
            <li class="<?= $active_sliders ?>">
                <a href="<?= DOMAIN ?>/admin/sliders">
                    <span class="menu-icon"><i class="fa-solid fa-sliders"></i></span>
                    <span class="menu-text text-truncate">مدیریت اسلایدر ها</span>
                </a>
            </li>
            <li class="<?= $active_comments ?>">
                <a href="<?= DOMAIN ?>/admin/comments">
                    <span class="menu-icon"><i class="fa-solid fa-comment"></i></span>
                    <span class="menu-text text-truncate">مدیریت نظرات</span>
                </a>
            </li>
            <li class="<?= $active_tickets ?>">
                <a href="<?= DOMAIN ?>/admin/tickets">
                    <span class="menu-icon"><i class="fa-solid fa-ticket"></i></span>
                    <span class="menu-text text-truncate">مدیریت تیکت ها</span>
                </a>
            </li>
            <li class="<?= $active_menus ?>">
                <a href="<?= DOMAIN ?>/admin/menus">
                    <span class="menu-icon"><i class="fa-solid fa-bars"></i></span>
                    <span class="menu-text text-truncate">مدیریت منو</span>
                </a>
            </li>
            <li class="<?= $active_pages ?>">
                <a href="<?= DOMAIN ?>/admin/pages">
                    <span class="menu-icon"><i class="fa-solid fa-layer-group"></i></span>
                    <span class="menu-text text-truncate">مدیریت صفحات</span>
                </a>
            </li>
            <li class="<?= $active_settings ?>">
                <a href="<?= DOMAIN ?>/admin/settings">
                    <span class="menu-icon"><i class="fa-solid fa-gear"></i></span>
                    <span class="menu-text text-truncate">تنظیمات سایت</span>
                </a>
            </li>
            <li>
                <a href="#" data-bs-toggle="modal" data-bs-target="#update_web">
                    <span class="menu-icon"><i class="fa-solid fa-screwdriver-wrench"></i></span>
                    <span class="menu-text text-truncate">بروزرسانی سایت</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- sidebar footer -->
    <div class="sidebar-footer">
        <li>
            <a href="<?= DOMAIN ?>/admin/logout">
                <span class="menu-icon"><i class="fa-solid fa-power-off"></i></span>
                <span class="menu-text text-truncate">خروج حساب کاربری</span>
            </a>
        </li>
    </div>
</section>
<script>
    let admin_id = "<?= $get_admin->id ?>"
    let PATH = "<?= DOMAIN ?>"
    // modal update web site
    var btn_go_update_web = $("#btn_go_update_web")
    var btn_close_modal = $("#btn_close_modal")

    function update_web(update) {
        btn_go_update_web.prop('disabled', true).text('در حال بررسی...')
        btn_close_modal.prop('disabled', true)
        $.ajax({
            url: PATH + "/admin_information/update_web/" + update + "",
            type: "POST",
            data: {btn_update_web: true},
            success: (data) => {
                let obj = JSON.parse(data)
                let message = obj.data.message
                let status_code = obj.statusCode
                switch (status_code) {
                    case 200:
                        alert_success(message)
                        setTimeout(() => {
                            location.reload()
                        }, 3000)
                        break;
                    case 500:
                        alert_error(message)
                        break;
                }
            },
            error: () => {
                alert_error('خطا در بروزرسانی')
                btn_go_update_web.prop('disabled', false).text('بزن بریم')
                btn_close_modal.prop('disabled', false)
            },
        }).done(() => {
            btn_go_update_web.prop('disabled', false).text('بزن بریم')
            btn_close_modal.prop('disabled', false)
        })
    }
</script>
<!-- Modal update site -->
<div class="modal fade" id="update_web" tabindex="-1" aria-labelledby="close_ticket_modal_label"
     aria-hidden="true"
     data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <i class="fa-solid fa-circle-exclamation text-warning" style="font-size: 5rem"></i>
                <p class="fs-5 fw-bold mt-4">ادمین گرامی</p>
                <?php if ($is_update) { ?>
                    <p class="fs-6"><?= $get_admin->first_name . ' ' . $get_admin->last_name ?> عزیز با غیر فعال کردن
                        این بخش سایت در دسترس کاربران قرار میگیرد!</p>
                <?php } else { ?>
                    <p class="fs-6"><?= $get_admin->first_name . ' ' . $get_admin->last_name ?> عزیز بعد از فعال کردن
                        بخش
                        بروزرسانی دیگر وبسایت قابل دسترس کاربران نخواهد بود!</p>
                <?php } ?>
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a href="#" class="w-100 me-2">
                        <button type="button" class="btn btn-primary w-100"
                                id="btn_go_update_web"
                                onclick="<?php if ($is_update) { ?>update_web(false)<?php } else { ?>update_web(true)<?php } ?>">
                            بزن بریم
                        </button>
                    </a>
                    <a href="#" data-bs-dismiss="modal" class="w-100">
                        <button type="button" class="btn btn-outline-primary w-100" data-bs-dismiss="modal"
                                id="btn_close_modal">بزار
                            بعدا
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>