<?php $get_ticket = $data['get_ticket'];
$ticket_chats = $data['chat_ticket'] ?>
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
                            <div class="d-flex justify-content-between align-items-center">
                                <h5><?= $get_ticket->ticket_title ?></h5>
                                <p> وضعیت:
                                    <?php switch ($get_ticket->ticket_status) {
                                        case "waiting":
                                            ?> <span
                                                class="badge text-warning p-2"> در انتظار پاسخ</span> <?php break;
                                        case "closed":
                                            ?> <span
                                                class="badge text-danger p-2">بسته شده</span> <?php break;
                                        case "answered":
                                            ?> <span
                                                class="badge text-success p-2">پاسخ داده شده</span> <?php break;
                                    } ?>
                                </p>
                                <div>
                                    <?php if ($get_ticket->ticket_status != 'closed') { ?>
                                        <a href="#" class="btn-orange" data-bs-toggle="modal"
                                           data-bs-target="#close_ticket_modal">بستن تیکت</a>
                                    <?php } ?>
                                    <a href="<?= DOMAIN ?>/account/tickets" class="btn-blue">بازگشت</a>
                                </div>
                            </div>
                            <hr>
                            <div class="overflow-y-scroll mb-2">
                                <?php foreach ($ticket_chats as $ticket_chat) { ?>
                                    <!-- image -->
                                    <?php if ($ticket_chat->ticket_image){ ?>
                                    <script>
                                        $(document).ready(() => {
                                            var file = new File(["<?= $ticket_chat->ticket_image ?>"], "<?= DL_DOMAIN ?>/public/images/tickets/<?= $ticket_chat->ticket_image ?>/<?= $ticket_chat->ticket_image ?>")
                                            replace_text(formatBytes(file.size), '#size-file-<?= $ticket_chat->id ?>')
                                        })
                                    </script>
                                <?php } ?>
                                <?php
                                switch ($ticket_chat->ticket_type) {
                                case "user":
                                ?>
                                    <!-- text ticket -->
                                    <div class="row mx-0 mb-3">
                                        <div class="d-flex justify-content-start">
                                            <div class="col-12 col-sm-9 col-md-6 col-lg-8 col-xl-6 col-xxl-5">
                                                <div class="card bg-anti-flash-white">
                                                    <div class="card-header border-0">
                                                                <span class="user-ticket"><i
                                                                            class="bi bi-person-fill me-2"></i><?= $get_user->first_name . ' ' . $get_user->last_name ?></span>
                                                    </div>
                                                    <div class="card-body text-justify pt-2">
                                                        <span><?= $ticket_chat->ticket_description ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php if (!empty($ticket_chat->ticket_image)){ ?>
                                    <!-- file ticket -->
                                    <div class="row mx-0 mb-3">
                                        <div class="d-flex justify-content-start">
                                            <div class="col-12 col-sm-9 col-md-6 col-lg-8 col-xl-6 col-xxl-5">
                                                <div class="card bg-anti-flash-white">
                                                    <div class="card-header border-0">
                                                                <span class="user-ticket"><i
                                                                            class="bi bi-person-fill me-2"></i><?= $get_user->first_name . ' ' . $get_user->last_name ?></span>
                                                    </div>
                                                    <div class="card-body text-justify pt-2">
                                                        <div class="d-flex align-items-center">
                                                        <span class="icon-file shadow-sm me-3"><i
                                                                    class="fa-solid fa-file"></i></span>
                                                            <div>
                                                                <span class="name-file"><?= $ticket_chat->ticket_image ?></span>
                                                                <div>
                                                                        <span class="size-file me-2"
                                                                              id="size-file-<?= $ticket_chat->id ?>"></span>
                                                                    <span><a href="<?= DL_DOMAIN ?>/public/images/tickets/<?= $ticket_chat->ticket_image ?>/<?= $ticket_chat->ticket_image ?>"
                                                                             class="text-orange"
                                                                             target="_blank">دانلود</a></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(() => {
                                            var file = new File(["<?= $ticket_chat->ticket_image ?>"], "<?= DL_DOMAIN ?>/public/images/tickets/<?= $ticket_chat->ticket_image ?>/<?= $ticket_chat->ticket_image ?>")
                                            replace_text(formatBytes(file.size), '#size-file-<?= $ticket_chat->id ?>')
                                        })
                                    </script>
                                <?php } ?>
                                <?php break;
                                case "admin":
                                $get_admin = $this->model->where('admins', 'id', $ticket_chat->admin_id);
                                ?>
                                    <!-- text ticket -->
                                    <div class="row mx-0 mb-3">
                                        <div class="d-flex justify-content-end">
                                            <div class="col-12 col-sm-9 col-md-6 col-lg-8 col-xl-6 col-xxl-5">
                                                <div class="card bg-anti-flash-white">
                                                    <div class="card-header border-0">
                                                                <span class="user-ticket"><i
                                                                            class="bi bi-person-fill me-2"></i><?= $get_admin->first_name . ' ' . $get_admin->last_name ?></span>
                                                    </div>
                                                    <div class="card-body text-justify pt-2">
                                                        <span><?= $ticket_chat->ticket_description ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (!empty($ticket_chat->ticket_image)){ ?>
                                    <!-- file ticket -->
                                    <div class="row mx-0 mb-3">
                                        <div class="d-flex justify-content-end">
                                            <div class="col-12 col-sm-9 col-md-6 col-lg-8 col-xl-6 col-xxl-5">
                                                <div class="card bg-anti-flash-white">
                                                    <div class="card-header border-0">
                                                        <span class="user-ticket"><i
                                                                    class="bi bi-person-fill me-2"><?= $get_admin->first_name . ' ' . $get_admin->last_name ?></i></span>
                                                    </div>
                                                    <div class="card-body text-justify pt-2">
                                                        <div class="d-flex align-items-center">
                                                        <span class="icon-file shadow-sm me-3"><i
                                                                    class="fa-solid fa-file"></i></span>
                                                            <div>
                                                                <span class="name-file"><?= $ticket_chat->ticket_image ?></span>
                                                                <div>
                                                                    <span class="size-file me-2"
                                                                          id="size-file-<?= $ticket_chat->id ?>"></span>
                                                                    <span><a href="<?= DL_DOMAIN ?>/public/images/tickets/<?= $ticket_chat->ticket_image ?>/<?= $ticket_chat->ticket_image ?>"
                                                                             class="text-orange"
                                                                             target="_blank">دانلود</a></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                    <?php break;
                                } ?>
                                <?php } ?>
                            </div>
                            <?php if ($get_ticket->ticket_status != 'closed') { ?>
                                <!-- form ticket -->
                                <form action="<?= DOMAIN ?>/account/user_ticket" method="post" class="border-form"
                                      id="form_answer_ticket">
                                    <div class="input-group bg-white">
                                    <textarea rows="1" class="form-control resize-none" placeholder="پیامی بنویسید..."
                                              id="ticket_text"></textarea>
                                        <input type="file" hidden id="ticket_image">
                                        <label for="ticket_image" class="btn shadow-none rounded-0 btn-outline-primary"><i
                                                    class="fa-solid fa-cloud-arrow-down"></i></label>
                                        <button class="btn shadow-none btn-outline-primary" type="button"
                                                id="answer_ticket"><i
                                                    class="fa-solid fa-paper-plane"></i></button>
                                    </div>
                                </form>
                            <?php } else {
                                Model::alert_null_data("تیکت شماره {$get_ticket->id} بسته شده است", 'alert-primary text-center fw-bold mt-5');
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php if ($get_ticket->ticket_status != 'closed') { ?>
    <!-- Modal -->
    <div class="modal fade" id="close_ticket_modal" tabindex="-1" aria-labelledby="close_ticket_modal_label"
         aria-hidden="true"
         data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <i class="fa-solid fa-circle-exclamation text-warning" style="font-size: 5rem"></i>
                    <p class="fs-5 fw-bold mt-4">کاربر گرامی</p>
                    <p class="fs-6">با بستن تیکت دیگر قابلیت ارسال پیام در این تیکت را ندارید</p>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="#" class="w-100 me-2">
                            <button type="button" class="btn btn-primary w-100" onclick="closed_ticket()"
                                    id="btn_go_closed_ticket">بزن بریم
                            </button>
                        </a>
                        <a href="#" data-bs-dismiss="modal" class="w-100">
                            <button type="button" class="btn btn-outline-primary w-100" data-bs-dismiss="modal">بزار
                                بعدا
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var btn_add_ticket = $("#answer_ticket")
        let ticket_image = ''
        var form_ticket_answer = $("#form_answer_ticket input textarea button")
        var ticket_id = "<?= $get_ticket->id ?>"
        $("#ticket_image").change(() => {
            ticket_image = $("#ticket_image").prop('files')[0]
        })
        $(document).ready(() => {
            btn_add_ticket.click(() => {
                var description = $("#ticket_text").val().trim()
                if (!empty(description)) {
                    var formData = new FormData()
                    formData.append('ticket_image', ticket_image)
                    formData.append('ticket_description', description)
                    formData.append('ticket_id', ticket_id)
                    formData.append('user_id', user_id)
                    formData.append('btn_answer_ticket', true)
                    ticket(formData)
                } else {
                    if (empty(description))
                        alert_error('فیلد متن تیکت اجباری است')
                }
            })
        })

        function ticket(data) {
            form_ticket_answer.prop('disabled', true)
            $.ajax({
                url: PATH + "/account/ticket_answer",
                type: "POST",
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: (data) => {
                    let obj = JSON.parse(data)
                    let status = obj.statusCode
                    let message = obj.data.message
                    switch (status) {
                        case 200:
                            window.location.href = obj.data.redirect
                            break;
                        case 500:
                            alert_error(message)
                            break;
                    }
                },
                error: () => {
                    alert_error('خطا در ثبت پاسخ')
                    form_ticket_answer.prop('disabled', false)
                },
            }).done(() => {
                form_ticket_answer.prop('disabled', false)
            })
        }

        function closed_ticket() {
            var id = "<?= $get_ticket->id ?>"
            var btn_go_closed_ticket = $("#btn_go_closed_ticket")
            btn_go_closed_ticket.prop('disabled', true).text('در حال بستن...')
            $.ajax({
                url: PATH + "/account/closed_ticket",
                type: "POST",
                data: {ticket_id: id, btn_ticket_closed: true},
                success: (data) => {
                    let obj = JSON.parse(data)
                    let status = obj.statusCode
                    let message = obj.data.message
                    switch (status) {
                        case 200:
                            window.location.href = obj.data.redirect
                            break;
                        case 500:
                            alert_error(message)
                            break;
                    }
                },
                error: () => {
                    alert_error('خطا در بستن تیکت')
                    btn_go_closed_ticket.prop('disabled', false).text('بزن بریم')
                }
            }).done(() => {
                btn_go_closed_ticket.prop('disabled', false).text('بزن بریم')
            })
        }
    </script>
<?php } ?>
