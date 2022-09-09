<!-- course comments -->
<div class="card rounded-3 border-0 box-shadow">
    <div class="card-body content-comments hide-content">
        <!-- title -->
        <div class="course mb-2">
            <span class="right">نظرات کاربران</span>
            <a class="btn-orange btn-comment" data-bs-toggle="collapse" href="#form-comment"><i
                        class="fa-solid fa-pen-to-square me-2"></i>ثبت دیدگاه</a>
            <a class="btn btn-warning text-white btn-comment-icon" data-bs-toggle="collapse"
               href="#form-comment"><i class="fa-solid fa-pen-to-square"></i></a>
        </div>
        <div class="collapse" id="form-comment">
            <!-- form comment -->
            <form action="" method="">
                <div class="mb-3">
                    <textarea class="form-control" rows="4" placeholder="نظر خود را بنویسید..."></textarea>
                </div>
                <div class="text-end">
                    <a href="#" class="btn-orange">ثبت</a>
                </div>
            </form>
        </div>
        <?php if (is_array($data['get_course_comments']) || is_object($data['get_course_comments'])) {
        foreach ($data['get_course_comments'] as $course_comment) { ?>
        <!-- comment -->
        <div class="card bg-light border-0 box-shadow my-5 mx-sm-2 mx-md-4">
            <div class="card-body">
                <div class="d-block d-sm-flex justify-content-sm-between align-items-sm-center text-center">
                    <p class="text-truncate"><i
                                class="fa-solid fa-user-pen text-blue me-2"></i><?php echo $course_comment->user_id ?>
                    </p>
                    <p class="text-muted"><?php echo $course_comment->create_time ?></p>
                </div>
                <hr>
                <span class="text-muted text-justify d-block"><?php echo $course_comment->comment_text ?></span>
                <?php
//                var_dump($this);
//                if ($answered_admin_comment){
                    ?>
                    <!-- answer comment -->
                    <div class="card bg-light mt-3 ms-sm-2 ms-md-3 ms-lg-5">
                        <div class="card-body">
                            <div class="d-block d-sm-flex justify-content-sm-between align-items-sm-center text-center">
                                <p class="text-truncate"><i
                                            class="fa-solid fa-user-pen text-blue me-2"></i>پاسخ مدرس</p>
                                <p class="text-muted">1401/05/04</p>
                            </div>
                            <hr>
                            <span class="text-muted text-justify d-block">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</span>
                        </div>
                    </div>
                <?php  ?>
            </div>
        </div>
        <!-- button show more -->
        <div class="show-more" id="content-comments">
            <button class="btn btn-blue mb-1"
                    onclick="ShowMore('content-comments','content-comments')"><i
                        class="fa-solid fa-angle-down me-2"></i>نمایش بیشتر
            </button>
        </div>
        <?php }
        } else { ?>
        <div class="alert alert-warning my-3 text-center"><h5 class="h5">نظری تا کنون ثبت نشده است</h5></div>
        <?php } ?>
    </div>
</div>