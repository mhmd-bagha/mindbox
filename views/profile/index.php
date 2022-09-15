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
                            <h5>داشبورد کاربری</h5>
                            <hr>
                            <?php require 'count_dashboard.php' ?>
                            <hr>
                            <?php require 'information_dashboard.php' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>