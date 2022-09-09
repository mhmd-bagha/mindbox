<!-- js -->
<script src="<?php echo DOMAIN ?>/public/js/popper.min.js"></script>
<script src="<?php echo DOMAIN ?>/public/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--js owl -->
<script src="<?php echo DOMAIN ?>/public/vendor/owl/owl.carousel.min.js"></script>
<!-- fontawesome js -->
<script src="<?php echo DOMAIN ?>/public/js/fontawesome.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
<script src="<?php echo DOMAIN ?>/public/vendor/video-player/js/video-player.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
<?php
if (!empty($this->scripts_name)) {
    if (file_exists(DOMAIN . "/public/vendor/{$this->scripts_name}")) {
        echo "<!--  links load  -->";
        foreach ($this->scripts_path as $script_path) {
            ?>
            <link rel="stylesheet" href="<?php echo DOMAIN ?>/public/vendor/<?= $script_path ?>">
            <?php
        }
    }
}
?>
<!-- script -->
<script src="<?php echo DOMAIN ?>/public/js/ui.js"></script>
<script src="<?php echo DOMAIN ?>/public/js/app.js"></script>
<!-- purecounter -->
<script>
    new PureCounter();

    const observer = lozad();
    observer.observe();
</script>
</body>
</html>