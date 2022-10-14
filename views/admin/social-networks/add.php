<!-- modal edit & add -->
<div class="modal fade" id="form" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">شبکه اجتماعی</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-start">
                <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post"
                      class="border-form" id="form_network">
                    <div class="mb-3">
                        <label for="network_name" class="mb-1">نام</label>
                        <input type="text" class="form-control" id="network_name">
                    </div>
                    <div class="mb-3">
                        <label for="network_address" class="mb-1">آدرس</label>
                        <input type="text" class="form-control" id="network_address">
                    </div>
                    <div class="mb-3">
                        <label for="network_icon" class="mb-1">آیکن</label>
                        <select class="form-control" id="network_icon">
                            <option value="fa-brands fa-instagram">اینستاگرام</option>
                            <option value="fa-brands fa-youtube">یوتوب</option>
                            <option value="fa-solid fa-compact-disc">آپارات</option>
                            <option value="fa-solid fa-paper-plane">تلگرام</option>
                            <option value="fa-brands fa-facebook">فیسبوک</option>
                            <option value="fa-brands fa-twitter">توییتر</option>
                            <option value="fa-solid fa-envelope">ایمیل</option>
                        </select>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-success py-2 px-5" id="btn_network">ثبت</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var btn_network = $("#btn_network")
    var form_network = $("#form_network input, #form_network select")
    $(document).ready(() => {
        btn_network.click(() => {
            var network_name = $("#network_name").val().trim()
            var network_address = $("#network_address").val().trim()
            var network_icon = $("#network_icon").val()
            if (!empty(network_name) && !empty(network_address) && !empty(network_icon)) {
                network(network_name, network_address, network_icon)
            } else {
                if (empty(network_name))
                    alert_error('فیلد عنوان اجباری است')
                if (empty(network_address))
                    alert_error('فیلد آدرس اجباری است')
                if (empty(network_icon))
                    alert_error('آیکون مورد نظر را انتخاب کنید')
            }
        })
    })

    function network(network_name, network_address, network_icon) {
        btn_network.text('در حال ثبت...').prop('disabled', true).addClass('disabled pointer-events btn_success_dot-flashing')
        form_network.prop('disabled', true)
        $.ajax({
            url: PATH + "/admin_social_networks/network",
            type: "POST",
            data: {
                network_name: network_name,
                network_address: network_address,
                network_icon: network_icon,
                type: 'add'
            },
            success: (data) => {
                let obj = JSON.parse(data)
                let message = obj.data.message
                let status_code = obj.statusCode
                switch (status_code) {
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
                alert_error('خطا در افزودن شبکه اجتماعی')
            }
        }).done(() => {
            btn_network.text('ثبت').prop('disabled', false).removeClass('disabled pointer-events btn_success_dot-flashing')
            form_network.prop('disabled', false)
        })
    }
</script>