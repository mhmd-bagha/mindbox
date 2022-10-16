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
                                <h5>تیکت جدید</h5>
                                <a href="user-tickets.php" class="btn-blue">بازگشت</a>
                            </div>
                            <hr>
                            <!-- form -->
                            <form action="<?= DOMAIN ?>/account/add_ticket" method="post" class="border-form"
                                  id="form_ticket">
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="ticket_title" class="mb-1">عنوان تیکت</label>
                                        <input type="text" class="form-control" id="ticket_title">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="ticket_image" class="mb-1">تصویر ضمیمه</label>
                                        <input type="file" class="form-control" id="ticket_image">
                                        <small>پسوند های مجاز png یا jpg یا jpeg</small>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="ticket_text" class="mb-1">متن تیکت</label>
                                    <textarea rows="8" class="form-control resize-none" id="ticket_text"></textarea>
                                </div>
                                <div class="text-end">
                                    <button class="btn-orange" type="button" id="add_ticket">ایجاد تیکت</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    var btn_add_ticket = $("#add_ticket")
    let ticket_image = ''
    var form_ticket_input = $("#form_ticket input, #form_ticket textarea")
    $("#ticket_image").change(() => {
        ticket_image = $("#ticket_image").prop('files')[0]
    })

    $(document).ready(() => {
        btn_add_ticket.click(() => {
            var title = $("#ticket_title").val().trim()
            var description = $("#ticket_text").val().trim()
            if (!empty(title) && !empty(description)) {
                var formData = new FormData()
                formData.append('ticket_image', ticket_image)
                formData.append('ticket_title', title)
                formData.append('ticket_description', description)
                formData.append('user_id', user_id)
                formData.append('btn_ticket', true)
                ticket(formData)
            } else {
                if (empty(title))
                    alert_error('فیلد عنوان تیکت اجباری است')
                if (empty(description))
                    alert_error('فیلد متن تیکت اجباری است')
            }
        })
    })

    function ticket(data) {
        btn_add_ticket.text('در‌حال ایجاد...').prop('disabled', true).addClass('disabled pointer-events btn_dot-flashing')
        form_ticket_input.prop('disabled', true)
        $.ajax({
            url: PATH + "/account/ticket_add",
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
                alert_error('خطا در ایجاد تیکت')
            },
        }).done(() => {
            btn_add_ticket.text('ایجاد تیکت').prop('disabled', false).removeClass('disabled pointer-events btn_dot-flashing')
            form_ticket_input.prop('disabled', false)
        })
    }
</script>