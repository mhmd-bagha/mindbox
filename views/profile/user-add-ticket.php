
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
                                    <h5>تیکت جدید</h5>
                                    <a href="user-tickets.php" class="btn-blue">بازگشت</a>
                                </div>
                                <hr>
                                <!-- form -->
                                <form action="" method="" class="border-form">
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label class="mb-1">عنوان</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label class="mb-1">تصویر</label>
                                            <input type="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1">متن پیام</label>
                                        <textarea rows="8" class="form-control"></textarea>
                                    </div>
                                    <div class="text-end">
                                        <button class="btn-orange" type="submit">ثبت</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
