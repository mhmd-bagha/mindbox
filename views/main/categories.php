<!-- categories bretz -->
<div class="container-fluid bg-anti-flash-white py-5">
    <div class="container text-center">
        <h3 class="fw-bold">دسته بندی ها مایندباکس</h3>
        <div class="owl-carousel owl-theme" id="categories-bretz">
            <!-- category -->
            <?php foreach ($data['categories'] as $category){ ?>
            <div class="item">
                <div class="card bg-transparent border-0">
                    <div class="card-body">
                        <a href="<?php echo DOMAIN ?>/courses/category/<?php echo $category->id ?>">
                            <img data-src="public/images/<?php echo $category->category_image ?>" alt="<?php echo $category->category_title ?>" data-alt="<?php echo $course_offer->course_title ?>" class="img-fluid lozad">
                            <h6 class="fw-bold text-dark text-truncate"><?php echo $category->category_title ?></h6>
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>