<?php $stories = $data['stories'];
if (is_array($stories) || is_object($stories)){ ?>
    <div class="container-fluid bg-anti-flash-white py-5">
    <div class="container">
    <div class="row">
<?php foreach ($stories as $story) { ?>
    <div class="col-12 col-lg-6 mb-4">
        <div class="card p-3 bg-transparent">
            <div class="card-body">
                <!-- title history -->
                <h4 class="history-title mb-3 text-orange"><?= $story->stories_title ?></h4>
                <!-- text history -->
                <p class="history-text text-dark"><?= $story->stories_description ?></p>
            </div>
        </div>
    </div>
<?php } ?>
    </div>
    </div>
    </div>
<?php } ?>