<div class="row">
    <!-- day -->
    <div class="col-12 col-md-4 col-lg-4 mb-4 mb-md-0">
        <div class="card border-0 rounded-0 box-shadow-sm">
            <div class="card-header icon-dashboard">
                <i class="bi bi-trophy"></i>
            </div>
            <div class="card-body">
                <h4 class="fw-bold"><?= $data['register_you_history'] ?> روز</h4>
                <span class="text-muted">سابقه عضویت شما</span>
            </div>
        </div>
    </div>
    <!-- tickets -->
    <div class="col-12 col-md-4 col-lg-4 mb-4 mb-md-0">
        <div class="card border-0 rounded-0 box-shadow-sm">
            <div class="card-header icon-dashboard">
                <i class="bi bi-ticket"></i>
            </div>
            <div class="card-body">
                <h4 class="fw-bold"><?= $data['count_my_ticket'] ?></h4>
                <span class="text-muted">تعداد تیکت های شما</span>
            </div>
        </div>
    </div>
    <!-- courses -->
    <div class="col-12 col-md-4 col-lg-4">
        <div class="card border-0 rounded-0 box-shadow-sm">
            <div class="card-header icon-dashboard">
                <i class="bi bi-display"></i>
            </div>
            <div class="card-body">
                <h4 class="fw-bold"><?= $data['count_my_course'] ?></h4>
                <span class="text-muted">تعداد دوره های شما</span>
            </div>
        </div>
    </div>
</div>