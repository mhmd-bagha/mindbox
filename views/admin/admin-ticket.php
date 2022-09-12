
    <div class="container-fluid">
        <!-- sidebar -->
        <?php
        require_once("admin-menu.php");
        ?>
        <!-- content wrapper -->
        <section class="content-wrapper">
            <!-- header content -->
            <?php
            require_once("admin-header.php");
            ?>
            <!-- main content -->
            <section class="main-content px-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>تیکت ها</h5>
                    <a href="admin-tickets.php" class="btn btn-primary"><i class="fa-solid fa-arrow-right me-2"></i>بازگشت</a>
                </div>
                <hr>
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white p-4">
                        <div class="d-sm-flex justify-content-sm-between">
                            <p class="m-0 text-truncate">محمد ابراهیمی</p>
                            <p class="m-0 text-truncate">تیکت اول</p>
                            <p class="m-0 text-truncate">mohammad@gmail.com</p>
                        </div>
                    </div>
                    <!-- chat -->
                    <div class="card-body">
                        <div class="overflow-y-scroll mb-2">
                            <!-- text ticket -->
                            <div class="row mx-0 mb-3">
                                <div class="d-flex justify-content-end">
                                    <div class="col-12 col-sm-9 col-md-6 col-lg-8 col-xl-6 col-xxl-5">
                                        <div class="card bg-anti-flash-white">
                                            <div class="card-header border-0">
                                                <span class="user-ticket"><i class="fa-solid fa-user me-2"></i>محمد ابراهیمی ابراهیم بقا</span>
                                            </div>
                                            <div class="card-body text-justify pt-2">
                                                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- text ticket -->
                            <div class="row mx-0 mb-3">
                                <div class="d-flex justify-content-start">
                                    <div class="col-12 col-sm-9 col-md-6 col-lg-8 col-xl-6 col-xxl-5">
                                        <div class="card bg-anti-flash-white">
                                            <div class="card-header border-0">
                                                <span class="user-ticket"><i class="fa-solid fa-user me-2"></i>محمد چشمی</span>
                                            </div>
                                            <div class="card-body text-justify pt-2">
                                                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- file ticket -->
                            <div class="row mx-0 mb-3">
                                <div class="d-flex justify-content-end">
                                    <div class="col-12 col-sm-9 col-md-6 col-lg-8 col-xl-6 col-xxl-5">
                                        <div class="card bg-anti-flash-white">
                                            <div class="card-header border-0">
                                                <span class="user-ticket"><i class="fa-solid fa-user me-2"></i>محمد ابراهیمی ابراهیم بقا</span>
                                            </div>
                                            <div class="card-body text-justify pt-2">
                                                <div class="d-flex align-items-center">
                                                    <span class="icon-file shadow-sm me-3"><i class="fa-solid fa-file"></i></span>
                                                    <div>
                                                        <span class="name-file">screenshot23.jpg</span>
                                                        <div>
                                                            <span class="size-file me-2">357 کیلوبایت</span>
                                                            <span><a href="#" class="text-orange" target="_blank">دانلود</a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- file ticket -->
                            <div class="row mx-0 mb-3">
                                <div class="d-flex justify-content-start">
                                    <div class="col-12 col-sm-9 col-md-6 col-lg-8 col-xl-6 col-xxl-5">
                                        <div class="card bg-anti-flash-white">
                                            <div class="card-header border-0">
                                                <span class="user-ticket"><i class="fa-solid fa-user me-2"></i>محمد چشمی</span>
                                            </div>
                                            <div class="card-body text-justify pt-2">
                                                <div class="d-flex align-items-center">
                                                    <span class="icon-file shadow-sm me-3"><i class="fa-solid fa-file"></i></span>
                                                    <div>
                                                        <span class="name-file">screenshot23.jpg</span>
                                                        <div>
                                                            <span class="size-file me-2">357 کیلوبایت</span>
                                                            <span><a href="#" class="text-orange" target="_blank">دانلود</a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- form ticket -->
                        <form action="" method="" class="border-form sticky-bottom">
                            <div class="input-group bg-white">
                                <textarea rows="1" class="form-control" placeholder="پیامی بنویسید..." style="resize: none;"></textarea>
                                <input type="file" hidden id="file-upload">
                                <label for="file-upload" class="btn shadow-none rounded-0 btn-outline-primary"><i class="fa-solid fa-cloud-arrow-down"></i></label>
                                <button class="btn shadow-none btn-outline-primary" type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </section>
    </div>
    <!-- admin backdrop -->
    <div class="admin-backdrop"></div>
