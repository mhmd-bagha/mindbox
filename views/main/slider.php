<?php if (is_array($data['sliders'])||is_object($data['sliders'])){ ?>
    <div class="container-fluid px-0">
    <div class="owl-carousel owl-theme" id="slider">
<?php foreach ($data['sliders'] as $slider) { ?>
    <div class="item">
        <a href="<?php echo $slider->slider_link ?>"><img data-src="<?php echo DOMAIN ?>/public/images/<?php echo $slider->slider_image ?>" alt="<?php echo $slider->slider_title ?>" class="owl-lazy"></a>
    </div>
<?php } ?>
    </div>
    </div>
<?php } ?>