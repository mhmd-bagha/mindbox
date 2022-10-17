<!-- information -->
<div class="card bg-anti-flash-white border-0 box-shadow-sm">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <p>نام و نام خانوادگی</p>
                <h6 class="fw-bold"><?= $get_user->first_name . ' ' . $get_user->last_name ?></h6>
            </div>
            <div class="col-12 col-md-6 mb-4">
                <p>ایمیل</p>
                <h6 class="fw-bold"><?= $get_user->user_email ?></h6>
            </div>
            <div class="col-12 col-md-6">
                <p>شماره همراه</p>
                <h6 class="fw-bold"><?= $get_user->phone_mobile ?></h6>
            </div>
        </div>
    </div>
</div>