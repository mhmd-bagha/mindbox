
    <!-- main -->
    <main>
        <div class="container-fluid py-5">
            <div class="container">
                <div class="card border-0 rounded-0 box-shadow-sm">
                    <div class="card-body p-0">
                        <div class="row mx-0">
                            <div class="col-12 col-lg-3 user-menu">
                                <!-- user menu -->
                                <?php
                                require_once("user-menu.php");
                                ?>
                            </div>
                            <div class="col-12 col-lg-9 user-content">
                                <h5>فاکتور ها</h5>
                                <hr>
                                <div class="table-responsive overflow-y-auto">
                                    <!-- table -->
                                    <table class="table table-striped table-hover table-bordered text-center text-nowrap">
                                        <thead class="table-dark sticky-top">
                                            <tr>
                                                <th>تاریخ</th>
                                                <th>تعداد دوره</th>
                                                <th>وضعیت پرداخت</th>
                                                <th>جزئیات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1401/05/29</td>
                                                <td>2</td>
                                                <td><span class="text-success">پرداخت موفق</span></td>
                                                <td><a class="btn btn-sm shadow-none btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#factor-details">جزئیات</a></td>
                                                <!-- modal factor details -->
                                                <div class="modal fade" id="factor-details" tabindex="-1">
                                                    <div class="modal-dialog modal-fullscreen-sm-down modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">جزئیات فاکتور</h5>
                                                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row factor-details">
                                                                    <div class="col-12 col-sm-6 mb-4 mb-sm-0">
                                                                        <a href="../course-details.php">دوره عادت های اتمی</a>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <span>مبلغ اصلی: 150,000 تومان</span>
                                                                        <span>تخفیف: 50,000 تومان</span>
                                                                        <span>قایل پرداخت: 100,000 تومان</span>
                                                                        <span>پرداخت نقدی</span>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row factor-details">
                                                                    <div class="col-12 col-sm-6 mb-4 mb-sm-0">
                                                                        <a href="../course-details.php">دوره سحرخیزی پلاس</a>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <span>مبلغ اصلی: 180,000 تومان</span>
                                                                        <span>تخفیف: 0 تومان</span>
                                                                        <span>قایل پرداخت: 180,000 تومان</span>
                                                                        <span>پرداخت کیف پول</span>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row factor-details">
                                                                    <div class="col-12 col-sm-6 mb-4 mb-sm-0">
                                                                        <a href="../course-details.php">دوره سحرخیزی پلاس</a>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <span>مبلغ اصلی: 180,000 تومان</span>
                                                                        <span>تخفیف: 0 تومان</span>
                                                                        <span>قایل پرداخت: 180,000 تومان</span>
                                                                        <span>پرداخت کیف پول</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                            <tr>
                                                <td>1401/04/16</td>
                                                <td>4</td>
                                                <td><span class="text-danger">پرداخت ناموفق</span></td>
                                                <td><a href="#" class="btn btn-sm shadow-none btn-outline-secondary">جزئیات</a></td>
                                            </tr>
                                            <tr>
                                                <td>1401/03/19</td>
                                                <td>1</td>
                                                <td><span class="text-success">پرداخت موفق</span></td>
                                                <td><a href="#" class="btn btn-sm shadow-none btn-outline-secondary">جزئیات</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
