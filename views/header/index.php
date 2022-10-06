<?php $header_setting = (new Model())->where('information', 'information_type', 'header');
$header_setting = json_decode($header_setting->information_data);
if ($header_setting):
    ?>
    <style>
        .bg-header_custom {
            background: <?= $header_setting->color ?> !important;
        }
    </style>
<?php endif; ?>
<div class="container-fluid bg-white">
    <div class="row align-items-center py-2">
        <!-- logo -->
        <div class="col-lg-2 col-xxl-1 d-none d-lg-block text-center">
            <a href="<?php echo DOMAIN ?>"><img
                        src="<?php echo DOMAIN ?>/public/images/public-images/logo/<?= $header_setting ? $header_setting->image . '/' . $header_setting->image : 'mindbox.svg/mindbox.svg'; ?>"
                        alt="mindbox"
                        class="img-fluid"></a>
        </div>
        <!-- form search -->
        <div class="col-7 col-sm-7 col-md-5 col-lg-5 col-xl-6 col-xxl-7">
            <div class="search-box w-100 w-xl-75 w-xxl-50">
                <i class="bi bi-search"></i>
                <input type="text"
                       class="search-input form-control shadow-none border-0 bg-anti-flash-white z-index3 px-5"
                       onkeyup="course_search(this.value)"
                       data-bs-toggle="modal" data-bs-target="#modal-search" placeholder="جستجو..."/>
            </div>
            <!-- box search -->
            <div class="search-card w-xl-75 w-xxl-50">
                <div class="search-body search-results">
                    <h6>نتایج جستجو</h6>
                    <ul class="res_search"></ul>
                </div>
            </div>
            <!-- modal search -->
            <div class="modal d-xl-none" id="modal-search" data-bs-backdrop="false" tabindex="-1">
                <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <div class="search-box w-100">
                                <a href="" class="modal-close" data-bs-dismiss="modal"><i
                                            class="fa-solid fa-arrow-right"></i></a>
                                <input type="text"
                                       class="form-control shadow-none border-0 border-bottom bg-transparent z-index3 ps-5"
                                       placeholder="جستجو..." onkeyup="course_search(this.value)"/>
                            </div>
                        </div>
                        <div class="modal-body ">
                            <div class="p-3 search-results">
                                <h6>نتایج جستجو</h6>
                                <ul class="res_search"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- login & register & cart-->
        <div class="col-5 col-sm-5 col-md-7 col-lg-5 col-xl-4 col-xxl-4 text-end">
            <?php if (!Model::SessionGet('user')) { ?>
                <a href="<?php echo DOMAIN ?>/login" class="btn-transparent d-none d-md-inline-block">ورود به حساب
                    کاربری</a>
                <a href="<?php echo DOMAIN ?>/register" class="btn btn-warning text-white btn-register-icon"><i
                            class="fa-solid fa-user-plus"></i></a>
                <a href="<?php echo DOMAIN ?>/register" class="btn-orange btn-register">ثبت نام</a>
            <?php } else { ?>
                <a href="<?php echo DOMAIN ?>/account/" class="btn btn-warning text-white"><i
                            class="fa-solid fa-user"></i></a>
                <a href="<?php echo DOMAIN ?>/cart/" class="btn ms-1"><i
                            class="bi bi-cart"></i><span>
                        <?php
                        $get_cart = $this->model->where('cart', 'status', 'waiting');
                        if ($get_cart) {
                            $courses_id = explode(',', $get_cart->courses_id);
                            echo count($courses_id);
                        } else {
                            echo 0;
                        }
                        ?>
                    </span></a>
            <?php } ?>
        </div>
    </div>
</div>
<!-- menu -->
<nav class="navbar navbar-expand-xl menu-header<?= ($header_setting) ? ' bg-header_custom' : ''; ?>">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#menu">
            <span class="navbar-icon text-white"><i class="fa-solid fa-align-right"></i></span>
        </button>
        <div class="offcanvas offcanvas-start menu-header<?= ($header_setting) ? ' bg-header_custom' : ''; ?>"
             tabindex="-1" id="menu">
            <div class="offcanvas-header">
                <a href="<?php echo DOMAIN ?>"><img
                            src="<?php echo DOMAIN ?>/public/images/public-images/logo/<?= $header_setting ? $header_setting->image . '/' . $header_setting->image : 'logo-menu.svg/logo-menu.svg'; ?>"
                            alt="مایندباکس"
                            class="img-fluid"></a>
                <button type="button" class="btn border-0 text-white" data-bs-dismiss="offcanvas"><i
                            class="fa-solid fa-xmark"></i></button>
            </div>
            <?php require 'menu_items.php' ?>
        </div>
        <?php if (!Model::SessionGet('user')) { ?>
            <a href="<?php echo DOMAIN ?>/login" class="btn-transparent d-md-none">ورود به حساب کاربری</a>
        <?php } else { ?>
            <a href="<?php echo DOMAIN ?>/account/" class="btn-transparent d-md-none">پنل کاربری</a>
        <?php } ?>
    </div>
</nav>
<!-- background color matte-->
<div class="bg-matte"></div>
<script>
    let append_data = $(".res_search")
    let item

    function course_search(value) {
        let PATH = "<?php echo DOMAIN ?>"
        value = value.trim()
        let value_length = value.length
        append_data.empty()
        if (value_length >= 2) {
            setTimeout(() => {
                $.ajax({
                    url: PATH + "/course_search",
                    type: "POST",
                    data: {value: value},
                    success: (data) => {
                        append_data.empty()
                        data = JSON.parse(data)
                        var status_code = data.statusCode
                        var messages = data.data
                        switch (status_code) {
                            case 200:
                                $.each(messages.message, (message_number, message) => {
                                    item = '<li><a href="' + PATH + '/courses/course_details/' + message.id + '">' + message.course_title + '</a></li>'
                                    append_data.append(item)
                                })
                                break;
                            case 500:
                                item = '<li>' + messages.message + '</li>'
                                append_data.append(item)
                                break;
                        }
                    },
                    error: () => {
                        append_data.empty()
                        item = '<li>خطا در ارتباط با سرور</li>'
                        append_data.append(item)
                    }
                })
            }, 500)
        }
    }
</script>