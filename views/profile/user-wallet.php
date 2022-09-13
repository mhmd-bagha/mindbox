
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
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>کیف پول</h5>
                                    <a href="user-add-ticket.php" class="btn-blue" data-bs-toggle="modal" data-bs-target="#wallet-charging">شارژ حساب</a>
                                    <!-- modal wallet charging -->
                                    <div class="modal fade" id="wallet-charging" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">شارژ کیف پول</h6>
                                                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row text-center mb-3">
                                                        <div class="col-6 col-sm-3 mb-2 mb-sm-0">
                                                            <button class="btn-blue" data-bs-price="50000" id="price-1" onclick="price_wallet('price-1', 'input-price')">50,000</button>
                                                        </div>
                                                        <div class="col-6 col-sm-3 mb-2 mb-sm-0">
                                                            <button class="btn-blue" data-bs-price="100000" id="price-2" onclick="price_wallet('price-2', 'input-price')">100,000</button>
                                                        </div>
                                                        <div class="col-6 col-sm-3">
                                                            <button class="btn-blue" data-bs-price="150000" id="price-3" onclick="price_wallet('price-3', 'input-price')">150,000</button>
                                                        </div>
                                                        <div class="col-6 col-sm-3">
                                                            <button class="btn-blue" data-bs-price="200000" id="price-4" onclick="price_wallet('price-4', 'input-price')">200,000</button>
                                                        </div>
                                                    </div>
                                                    <form action="" method="" class="border-form">
                                                        <div class="mb-3">
                                                            <label class="mb-1">مبلغ (تومان)</label>
                                                            <input type="text" class=" form-control" id="input-price">
                                                            <small>حداقل مبلغ 500 تومان می باشد.</small>
                                                        </div>
                                                        <div class="text-end">
                                                            <button class="btn-orange" type="submit">شارژ حساب</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="table-responsive overflow-y-auto">
                                    <!-- table -->
                                    <table class="table table-striped table-hover table-bordered text-center text-nowrap">
                                        <thead class="table-dark sticky-top">
                                            <tr>
                                                <th>مبلغ (تومان)</th>
                                                <th>وضعیت پرداخت</th>
                                                <th>تاریخ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>150,000</td>
                                                <td><span class="text-success">پرداخت موفق</span></td>
                                                <td>1401/05/29</td>
                                            </tr>
                                            <tr>
                                                <td>230,000</td>
                                                <td><span class="text-danger">پرداخت ناموفق</span></td>
                                                <td>1401/04/16</td>
                                            </tr>
                                            <tr>
                                                <td>148,000</td>
                                                <td><span class="text-success">پرداخت موفق</span></td>
                                                <td>1401/03/19</td>
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
