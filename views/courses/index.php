<main>
    <div class="container-fluid py-5">
        <div class="container">
            <h5 class="fw-bold pb-4">دوره های آموزشی مایندباکس</h5>
            <div class="row">
                <?php require 'filters.php' ?>
                <!-- courses -->
                <div class="col-12 col-lg-8 col-xl-9">
                    <?php require 'courses.php' ?>
                    <?php require 'pagination.php' ?>
                </div>
            </div>
        </div>
    </div>
</main>