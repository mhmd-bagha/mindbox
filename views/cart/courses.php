<!-- course -->
<?php $courses_id = $data_cart->courses_id = explode(',', $data_cart->courses_id);
foreach ($courses_id as $course_id) {
    $data_course = $this->model->where('courses', 'id', $course_id);
    ?>
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-5 col-lg-6 col-xl-4 mb-3 mb-sm-0">
                    <a href="<?php echo DOMAIN . '/courses/course_details/' . $data_course->id ?>">
                        <img src="<?php echo DL_DOMAIN ?>/public/images/course/<?= $data_course->course_image . '/' . $data_course->course_image ?>"
                             alt="<?= $data_course->course_title ?>" class="img-fluid">
                    </a>
                </div>
                <div class="col-12 col-sm-5 col-md-6 col-lg-5 col-xl-7 fw-bold">
                    <a href="<?php echo DOMAIN . '/courses/course_details/' . $data_course->id ?>"><p class="fs-6 text-muted text-truncate"><?= $data_course->course_title ?></p></a>
                    <p class="text-danger">
                        <?php if ($data_course->course_discount != null){ ?>
                        <span class="text-decoration-line-through"><?= number_format($data_course->course_price) ?> تومان</span>
                    </p>
                    <p class="text-blue"><?= number_format($data_course->course_price - ($data_course->course_price * $data_course->course_discount / 100)) ?>
                        تومان</p>
                    <?php } else { ?>
                        <p class="text-blue"><?= number_format($data_course->course_price) ?> تومان</p>
                    <?php } ?>
                </div>
                <div class="col-12 col-sm-1 col-md-1 col-lg-1 col-xl-1 text-end align-self-end">
                    <button class="btn fs-5 text-danger m-0 p-0 border-0" id="delete_course_cart"
                            onclick="if (confirm('آیا با حذف این دوره از سبد خرید موافقت میکنید؟')) delete_cart('<?= $data_course->id ?>')"><i
                                class="fa-solid fa-trash-can"></i></button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script>
    var PATH = "<?= DOMAIN ?>"
    var delete_course_cart = $("#delete_course_cart");

    function delete_cart(course_id) {
        delete_course_cart.prop('disabled', true)
        $.ajax({
            url: PATH + "/cart/delete_cart",
            type: "POST",
            data: {course_id: course_id, delete_cart: true},
            success: (data) => {
                let obj = JSON.parse(data)
                let status = obj.statusCode
                let message = obj.data.message
                switch (status) {
                    case 200:
                        window.location.href = PATH + '/cart'
                        break;
                    case 500:
                        alert_error(message)
                        break;
                }
                delete_course_cart.prop('disabled', false)
            },
            error: () => {
                alert_error('خطا در حذف دوره از سبد خرید')
                delete_course_cart.prop('disabled', false)
            }
        })
    }
</script>
