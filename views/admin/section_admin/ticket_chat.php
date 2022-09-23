<?php $ticket_chats = $data['chat_ticket'] ?>
<!-- chat -->
<div class="card-body">
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
                <div class="d-flex justify-content-end">
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
                <div class="d-flex justify-content-end">
                    <div class="col-12 col-sm-9 col-md-6 col-lg-8 col-xl-6 col-xxl-5">
                        <div class="card bg-anti-flash-white">
                            <div class="card-header border-0"><span class="user-ticket"><i
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
                <div class="d-flex justify-content-start">
                    <div class="col-12 col-sm-9 col-md-6 col-lg-8 col-xl-6 col-xxl-5">
                        <div class="card bg-anti-flash-white">
                            <div class="card-header border-0"><span class="user-ticket"><i
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
                <div class="d-flex justify-content-start">
                    <div class="col-12 col-sm-9 col-md-6 col-lg-8 col-xl-6 col-xxl-5">
                        <div class="card bg-anti-flash-white">
                            <div class="card-header border-0"><span class="user-ticket"><i
                                            class="bi bi-person-fill me-2"></i><?= $get_admin->first_name . ' ' . $get_admin->last_name ?></span>
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
    <!-- form ticket -->
    <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post" class="border-form sticky-bottom"
          id="form_answer_ticket">
        <div class="input-group bg-white">
                            <textarea rows="1" class="form-control" placeholder="پیامی بنویسید..."
                                      style="resize: none;" id="ticket_text"></textarea>
            <input type="file" hidden id="ticket_image">
            <label for="ticket_image" class="btn shadow-none rounded-0 btn-outline-primary"><i
                        class="fa-solid fa-cloud-arrow-down"></i></label>
            <button class="btn shadow-none btn-outline-primary" type="button" id="answer_ticket"><i
                        class="fa-solid fa-paper-plane"></i></button>
        </div>
    </form>
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
            let description = $("#ticket_text").val().trim()
            if (!empty(description)) {
                var formData = new FormData()
                formData.append('ticket_image', ticket_image)
                formData.append('ticket_description', description)
                formData.append('ticket_id', ticket_id)
                formData.append('admin_id', admin_id)
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
            url: PATH + "/admin/ticket_answer",
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
</script>