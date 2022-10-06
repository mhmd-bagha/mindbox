<!-- filter -->
<div class="col-12 col-lg-4 col-xl-3">
    <div class="row align-items-center">
        <!-- type -->
        <div class="col-12 col-sm-6 col-lg-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <span class="fw-bold">فیلتر بر اساس نوع</span>
                </div>
                <div class="card-body text-center">
                    <div class="btn-group btn-group-orange">
                        <a href="?type=all">
                            <label class="shadow-none" for="btnradio1">همه</label>
                        </a>
                        <a href="?type=money">
                            <label class="shadow-none label-center" for="btnradio2">خریدنی</label>
                        </a>
                        <a href="?type=free">
                            <label class="shadow-none" for="btnradio3">رایگان</label>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- sort -->
        <div class="col-12 col-sm-6 col-lg-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <span class="fw-bold">مرتب سازی بر اساس</span>
                </div>
                <div class="card-body border-form">
                    <select class="form-control">
                        <option value="new" onclick="location.href = '?sort='+this.value">جدیدترین</option>
                        <option value="old" onclick="location.href = '?sort='+this.value">قدیمی ترین</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- discounted -->
        <div class="col-12 col-sm-6 col-lg-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input shadow-none form-check-input-orange"
                               type="checkbox"
                               id="only_discount"<?php echo (isset($_GET['discount'])) ? 'checked' : ''; ?>>
                        <label for="only_discount" class="form-check-label">فقط محصولات تخفیف دار</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- level -->
        <div class="col-12 col-sm-6 col-lg-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <span class="fw-bold">فیلتر بر اساس سطح</span>
                </div>
                <div class="card-body border-form">
                    <select class="form-control">
                        <option value="all" onclick="location.href = '?level='+this.value">همه</option>
                        <option value="preliminary" onclick="location.href = '?level='+this.value">مقدماتی</option>
                        <option value="medium" onclick="location.href = '?level='+this.value">متوسط</option>
                        <option value="advanced" onclick="location.href = '?level='+this.value">پیشرفته</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var only_discount = $("#only_discount")
    only_discount.click(() => {
        if (only_discount.is(":checked"))
            location.href = '?discount=true'
        else {
            <?php $url = explode('?', currentUrl())[0] ?>
            location.href = '<?= $url ?>'
        }
    })
</script>