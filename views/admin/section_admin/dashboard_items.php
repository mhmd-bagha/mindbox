<div class="row mb-4">
    <!-- users -->
    <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-sm-4 mb-xl-0">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex">
                    <div class="bg-info text-white rounded-1 p-4">
                        <h4><i class="fa-solid fa-users"></i></h4>
                    </div>
                    <div class="d-flex flex-column justify-content-between ms-2">
                        <h6>مجموع کاربران</h6>
                        <h6 class="fw-bold"><?= $data['count_all_users'] ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- comments -->
    <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-sm-4 mb-xl-0">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex">
                    <div class="bg-danger text-white rounded-1 p-4">
                        <h4><i class="fa-solid fa-comments"></i></h4>
                    </div>
                    <div class="d-flex flex-column justify-content-between ms-2">
                        <h6>مجموع نظرات</h6>
                        <h6 class="fw-bold"><?= $data['count_all_comments'] ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tickets -->
    <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-sm-0 mb-xl-0">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex">
                    <div class="bg-success text-white rounded-1 p-4">
                        <h4><i class="fa-solid fa-ticket"></i></h4>
                    </div>
                    <div class="d-flex flex-column justify-content-between ms-2">
                        <h6>مجموع تیکت ها</h6>
                        <h6 class="fw-bold">0</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- courses -->
    <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-sm-0 mb-xl-0">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex">
                    <div class="bg-warning text-white rounded-1 p-4">
                        <h4><i class="fa-solid fa-display"></i></h4>
                    </div>
                    <div class="d-flex flex-column justify-content-between ms-2">
                        <h6>مجموع دوره ها</h6>
                        <h6 class="fw-bold"><?= $data['count_all_courses'] ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>