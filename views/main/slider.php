<div class="container-fluid px-0">
    <div class="owl-carousel owl-theme" id="slider">
        <?php foreach ($data['sliders'] as $slider) { ?>
            <div class="item">
                <a href="<?php echo $slider->slider_link ?>"><img src="<?php echo DOMAIN ?>/public/images/<?php echo $slider->slider_image ?>" alt="<?php echo $slider->slider_title ?>"></a>
            </div>
        <?php } ?>
    </div>
</div>