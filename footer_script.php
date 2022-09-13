<!-- bootstrap js -->
<script src="<?php echo DOMAIN ?>/public/js/popper.min.js"></script>
<script src="<?php echo DOMAIN ?>/public/js/bootstrap.min.js"></script>
<!-- fontawesome js -->
<script src="<?php echo DOMAIN ?>/public/js/fontawesome.js"></script>
<!-- sweetalert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- lazy load  -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
<?php
if (!empty($this->scripts_path))
    foreach ($this->scripts_path as $script_path) {
        if (!empty($link_path)) {
            if (file_exists("public/{$script_path}")) {
                echo "<!-- " . explode('/', $script_path)[0] . " -->";
                ?>
                <script src="<?php echo DOMAIN ?>/public/vendor/<?= $script_path ?>"></script>
                <?php
            }
        }
    }
?>
<!-- script ui -->
<script src="<?php echo DOMAIN ?>/public/js/ui.js"></script>
<script>
    new PureCounter();
</script>
</body>
</html>