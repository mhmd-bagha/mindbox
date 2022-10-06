<?php $is_update = $this->model->where('information', 'information_type', 'update') ?>
<section class="header-content">
    <span class="toggle-menu"><i class="fa-solid fa-bars"></i></span>
    <a href="#" data-bs-toggle="modal" data-bs-target="#update_web">بروزرسانی</a>
    <a href="<?= DOMAIN ?>"><img src="<?= DOMAIN ?>/public/images/public-images/logo/mindbox.svg/mindbox.svg" alt=""
                                 class="img-fluid"></a>
</section>

<!-- Modal -->
<div class="modal fade" id="update_web" tabindex="-1" aria-labelledby="close_ticket_modal_label"
     aria-hidden="true"
     data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <i class="fa-solid fa-circle-exclamation text-warning" style="font-size: 5rem"></i>
                <p class="fs-5 fw-bold mt-4">ادمین گرامی</p>
                <?php if ($is_update){ ?>
                    <p class="fs-6"><?= $get_admin->first_name . ' ' . $get_admin->last_name ?> عزیز با غیر فعال کردن این بخش سایت در دسترس کاربران قرار میگیرد!</p>
                <?php }else{ ?>
                    <p class="fs-6"><?= $get_admin->first_name . ' ' . $get_admin->last_name ?> عزیز بعد از فعال کردن بخش
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
<script>
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