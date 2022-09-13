
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
                                <h5>دوره های من</h5>
                                <hr>
                                <div class="table-responsive overflow-y-auto">
                                    <!-- table -->
                                    <table class="table table-striped table-hover table-bordered text-center text-nowrap">
                                        <thead class="table-dark sticky-top">
                                            <tr>
                                                <th>عنوان آموزش</th>
                                                <th>تاریخ آخرین بروزرسانی</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="../course-details.php" class="text-blue">دوره عادت های اتمی</a></td>
                                                <td>1401/05/26</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#" class="text-blue">دوره سحرخیزی پلاس</a></td>
                                                <td>1401/05/16</td>
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
