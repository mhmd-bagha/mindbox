<!-- course comments -->
<div class="card rounded-3 border-0 box-shadow">
    <div class="card-body content-comments hide-content">
        <!-- title -->
        <div class="course mb-2">
            <span class="right">نظرات کاربران</span>
            <button type="button" class="btn-orange btn-comment" id="click_collapse" data-bs-toggle="collapse"
                    href="#form-comment"><i
                        class="fa-solid fa-pen-to-square me-2"></i>ثبت دیدگاه
            </button>
            <a class="btn btn-warning text-white btn-comment-icon" data-bs-toggle="collapse"
               href="#form-comment"><i class="fa-solid fa-pen-to-square"></i></a>
        </div>
        <div class="collapse" id="form-comment">
            <!-- form comment -->
            <?php if (Model::SessionGet('user')) {
                if ($this->exist_course_to_factors($course_details->id)) {
                    ?>
                    <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>/courses/comment"
                          method="post">
                        <div class="mb-3">
                        <textarea class="form-control" rows="4" placeholder="نظر خود را بنویسید..."
                                  id="comment"></textarea>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn-orange px-5 fs-6 py-2" id="btn_comment">ثبت</button>
                        </div>
                    </form>
                <?php } else {
                    ?>
                    <div class="alert alert-warning fs-6 my-3">برای ثبت نظر باید در دوره ثبت نام کنید</div>
                    <?php
                }
            } else {
                ?>
                <div class="alert alert-warning fs-6 my-3">برای ثبت نظر باید در در سایت <a href="<?= DOMAIN ?>/login?back=<?= 'courses/course_details/' . $course_details->id ?>">وارد</a> شوید</div>
                <?php
            } ?>
        </div>
        <?php if (is_array($data['get_course_comments']) || is_object($data['get_course_comments'])) {
        foreach ($data['get_course_comments'] as $course_comment) { ?>
            <!-- comment -->
            <div class="card bg-light border-0 box-shadow my-5 mx-sm-2 mx-md-4">
                <div class="card-body">
                    <div class="d-block d-sm-flex justify-content-sm-between align-items-sm-center text-center">
                        <p class="text-truncate"><i
                                    class="fa-solid fa-user-pen text-blue me-2"></i><?php $user_data = $this->model->where('users', 'id', $course_comment->user_id);
                            echo $user_data->first_name . ' ' . $user_data->last_name ?>
                        </p>
                        <p class="text-muted"><?php echo $course_comment->create_time ?></p>
                    </div>
                    <hr>
                    <span class="text-muted text-justify d-block"><?php echo $course_comment->comment_text ?></span>
                    <?php
                    $answered_admin = $this->model->where('comments', 'reply_id', $course_comment->id);
                    if ($answered_admin) {
                        ?>
                        <!-- answer comment -->
                        <div class="card bg-light mt-3 ms-sm-2 ms-md-3 ms-lg-5">
                            <div class="card-body">
                                <div class="d-block d-sm-flex justify-content-sm-between align-items-sm-center text-center">
                                    <p class="text-truncate"><i
                                                class="fa-solid fa-user-pen text-blue me-2"></i>پاسخ مدرس</p>
                                    <p class="text-muted"><?= $answered_admin->create_time ?></p>
                                </div>
                                <hr>
                                <span class="text-muted text-justify d-block"><?= $answered_admin->comment_text ?></span>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- button show more -->
            <div class="show-more" id="content-comments">
                <button class="btn btn-blue mb-1"
                        onclick="ShowMore('content-comments','content-comments')"><i
                            class="fa-solid fa-angle-down me-2"></i>نمایش بیشتر
                </button>
            </div>
            <script>
                var btn_comment = $("#btn_comment")
                var id = "<?= $course_details->id ?>"
                var user_id = "<?php $email = $this->model->decrypt(Model::SessionGet('user')); echo $this->model->where('users', 'user_email', $email)->id; ?>"
                var input_comment = $("#comment")
                var click_collapse = $("#click_collapse")
                $(document).ready(() => {
                    btn_comment.click(() => {
                        var comment_text = $("#comment").val().trim()
                        if (!empty(comment_text)) {
                            sendComment(id, user_id, comment_text)
                        } else {
                            alert_error('نظر خود را بنویسید')
                        }
                    })
                })

                function sendComment(course_id, user_id, comment) {
                    btn_comment.text('در حال ثبت...').prop('disabled', true)
                    input_comment.prop('disabled', true)
                    $.ajax({
                        url: PATH + "/courses/comment",
                        type: "POST",
                        data: {course_id: course_id, user_id: user_id, comment: comment, btn_comment: true},
                        success: (data) => {
                            var obj = JSON.parse(data)
                            var message = obj.data.message
                            var status_code = obj.statusCode
                            switch (status_code) {
                                case 200:
                                    alert_success(message)
                                    click_collapse.click()
                                    break;
                                case 500:
                                    alert_error(message)
                                    break;
                            }
                            btn_comment.text('ثبت').prop('disabled', false)
                            input_comment.prop('disabled', false).val('')
                        },
                        error: () => {
                            alert_error('خطا در برقراری ارتباط با سرور')
                            btn_comment.text('ثبت').prop('disabled', false)
                            input_comment.prop('disabled', false)
                        }
                    })
                }
            </script>
        <?php }
        } else { ?>
            <div class="alert alert-warning my-3 text-center"><h5 class="h5">نظری تا کنون ثبت نشده است</h5></div>
        <?php } ?>
    </div>
</div>