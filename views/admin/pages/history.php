<!-- content -->
<div class="tab-pane fade" id="tab-history">
    <!-- form -->
    <form action="<?= htmlspecialchars(currentUrl()) ?>" method="post" class="border-form" id="form_story">
        <div class="col-12 col-md-6 col-xl-4 mb-3">
            <label for="" class="mb-1">عنوان</label>
            <input type="text" class="form-control" id="story_title"/>
        </div>
        <div class="mb-3">
            <label for="" class="mb-1">متن</label>
            <textarea class="form-control" id="story_description"></textarea>
        </div>
        <div class="text-end">
            <button type="button" class="btn btn-success py-2 px-5" id="btn_story">ثبت</button>
        </div>
    </form>
</div>
<script>
    var btn_story = $("#btn_story")
    var form_story = $("#form_story input, #form_story textarea")
    $(document).ready(() => {
        btn_story.click(() => {
            var story_title = $("#story_title").val().trim()
            var story_description = $("#story_description").val().trim()
            if (!empty(story_title) && !empty(story_description)) {
                story_add(story_title, story_description)
            } else {
                if (empty(story_title)) alert_error('فیلد عنوان اجباری است')
                if (empty(story_description)) alert_error('فیلد متن اجباری است')
            }
        })
    })

    function story_add(title, description) {
        form_story.prop('disabled', true)
        btn_story.prop('disabled', true).text('در حال ثبت...')
        $.ajax({
            url: PATH + "/admin_information/story_add",
            type: "POST",
            data: {title: title, description: description, btn_story: true},
            success: (data) => {
                let obj = JSON.parse(data)
                let message = obj.data.message
                let status_code = obj.statusCode
                switch (status_code) {
                    case 200:
                        alert_success(message)
                        form_story.val('')
                        break;
                    case 500:
                        alert_error(message)
                        break;
                }
                form_story.prop('disabled', false)
                btn_story.prop('disabled', false).text('ثبت')
            },
            error: () => {
                alert_error('خطا در ارسال اطلاعات')
                form_story.prop('disabled', false)
                btn_story.prop('disabled', false).text('ثبت')
            }
        })
    }
</script>