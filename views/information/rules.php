<main>
    <!-- rules -->
    <div class="container-fluid py-5">
        <div class="container">
            <h2 class="fw-bold mb-4">قوانین و مقررات</h2>
            <?php foreach ($data['rules'] as $rule) {
                $data_rule = json_decode($rule->information_data); ?>
                <!-- rule card -->
                <div class="card border-0 bg-anti-flash-white shadow p-3 mb-5 mb-md-4">
                    <div class="card-body">
                        <h5 class="fw-bold text-blue "><?= $data_rule->rule_title ?></h5>
                        <p class="text-rule"><?= $data_rule->rule_description ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>