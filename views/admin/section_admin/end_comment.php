<?php if (is_array($data['end_comments']) || is_object($data['end_comments'])) { ?>
    <!-- last comments -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h6 class="fw-bold mb-4">آخرین نظرات</h6>
            <hr>
            <?php foreach ($data['end_comments'] as $end_comment) { ?>
                <!-- comment -->
                <div class="card border-0 bg-anti-flash-white shadow-sm mb-4">
                    <div class="card-header bg-transparent pb-0">
                        <div class="d-flex justify-content-between align-items-center text-center">
                            <p class="text-truncate small"><i
                                        class="fa-solid fa-user me-2"></i><?= $this->model->where('users', 'id', $end_comment->user_id)->last_name; ?>
                            </p>
                            <p class="text-muted small"><?= $end_comment->create_time ?></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <span class="text-muted text-justify d-block"><?= $end_comment->comment_text ?></span>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>