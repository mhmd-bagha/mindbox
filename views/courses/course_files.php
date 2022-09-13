<!-- course meetings -->
<div class="card rounded-3 border-0 box-shadow mb-5">
    <div class="card-body content-session hide-content">
        <!-- title -->
        <div class="course mb-4">
            <span class="right">جلسات دوره</span>
            <span class="left"><?php echo $data['count_course_files'] ?></span>
        </div>
        <?php if (is_array($data['get_course_file']) || is_object($data['get_course_file'])) {
            foreach ($data['get_course_file'] as $course_file) { ?>
                <!-- meeting -->
                <div class="card border-0 rounded-2 box-shadow m-4">
                    <div class="card-body">
                        <div class="row align-items-baseline">
                            <div class="col-12 col-sm-8 col-md-9 col-lg-8 col-xl-9 d-flex text-start pb-3 pb-sm-0">
                                <span class="course-icon-bar me-3"><i class="fa-solid fa-bars"></i></span>
                                <span class="text-muted text-truncate"><?php echo $course_file->number_part ?>. <?php echo $course_file->course_title ?></span>
                                <?php
                                if ($course_file->course_type == 'lock') {
                                    if (Model::SessionGet('user')) {
                                        if (!$this->exist_course_to_factors($course_details->id)) {
                                            ?>
                                            <span class="course-icon-lock ms-3"><i
                                                        class="fa-solid fa-lock"></i></span>
                                        <?php }
                                    }
                                } ?>
                            </div>
                            <div class="col-12 col-sm-4 col-md-3 col-lg-4 col-xl-3 text-end">
                                <span class="text-muted"><?php echo $course_file->course_time ?></span>
                                <?php switch ($course_file->course_type) {
                                    case "free": ?>
                                        <a href="<?php echo DOMAIN ?>/public/course-files/<?php echo $course_details->course_title . '-' . $course_details->id ?>/<?php echo $course_file->course_file ?>"
                                           class="course-icon-download active ms-3" target="_blank"><i
                                                    class="fa-solid fa-download"></i></a>
                                        <?php break;
                                    case "lock":
                                        if (Model::SessionGet('user')) {
                                            if ($this->exist_course_to_factors($course_details->id)) {
                                                ?>
                                                <a href="<?php echo DOMAIN ?>/public/course-files/<?php echo $course_details->course_title . '-' . $course_details->id ?>/<?php echo $course_file->course_file ?>"
                                                   class="course-icon-download active ms-3" target="_blank"><i
                                                            class="fa-solid fa-download"></i></a>
                                            <?php } else {
                                                ?>
                                                <a class="course-icon-download ms-3" target="_blank"
                                                   onclick="alert_error('شما این دوره را نخریدید!', 'warning')"><i
                                                            class="fa-solid fa-download"></i></a>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <a class="course-icon-download ms-3" target="_blank"
                                               onclick="alert_error('برای استفاده از این فایل باید وارد سایت شوید', 'warning')"><i
                                                        class="fa-solid fa-download"></i></a>
                                            <?php
                                        }
                                        break;
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- button show more -->
            <div class="show-more" id="content-meeting">
                <button class="btn btn-blue mb-1"
                        onclick="ShowMore('content-meeting','content-meeting')"><i
                            class="fa-solid fa-angle-down me-2"></i>نمایش بیشتر
                </button>
            </div>
            <?php
        } ?>
    </div>
</div>
