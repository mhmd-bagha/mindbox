<!-- modal edit & add -->
<div class="modal fade" id="form" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">منو</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-start">
                <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post"
                      class="border-form" id="form_add_menu">
                    <div class="mb-3">
                        <label for="menu_name" class="mb-1">نام</label>
                        <input type="text" class="form-control" id="menu_name">
                    </div>
                    <div class="mb-3">
                        <label for="menu_address" class="mb-1">آدرس</label>
                        <input type="text" class="form-control" id="menu_address">
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-success py-2 px-2" id="btn_menu">ثبت</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    let btn_menu = $("#btn_menu")
    let form_add_menu = $("#form_add_menu input button")
    $(document).ready(() => {
        btn_menu.click(() => {
            var menu_name = $("#menu_name").val().trim()
            var menu_address = $("#menu_address").val().trim()
            menu(menu_name, menu_address)
        })
    })

    function menu(menu_name, menu_address) {
        form_add_menu.prop('disabled', true).text('در حال بررسی...').addClass('disabled pointer-events btn_success_dot-flashing')
        $.ajax({
            url: PATH + "/menu/menu",
            type: "POST",
            data: {menu_name: menu_name, menu_address: menu_address, type: 'add'},
            success: (data) => {
                let obj = JSON.parse(data)
                let status = obj.statusCode
                let message = obj.data.message
                switch (status) {
                    case 200:
                        alert_success(message)
                        setTimeout(() => location.reload(), 3000)
                        break;
                    case 500:
                        alert_error(message)
                        break;
                }
            },
            error: () => {
                alert_error('خطا در ثبت منو')
            }
        }).done(() => {
            form_add_menu.prop('disabled', false).text('ثبت').removeClass('disabled pointer-events btn_success_dot-flashing')
        })
    }
</script>