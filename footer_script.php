<!-- bootstrap js -->
<script src="<?php echo DOMAIN ?>/public/js/popper.min.js"></script>
<script src="<?php echo DOMAIN ?>/public/js/bootstrap.min.js"></script>
<!-- fontawesome js -->
<script src="<?php echo DOMAIN ?>/public/js/fontawesome.js"></script>
<!-- sweetalert2 -->
<!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->
<script src="<?php echo DOMAIN ?>/public/js/sweetalert2@11.js"></script>
<!-- script ui -->
<script src="<?php echo DOMAIN ?>/public/js/ui.js"></script>
<?php
if (!empty($this->scripts_path))
    foreach ($this->scripts_path as $script_path) {
        if (!empty($script_path)) {
            if (file_exists("public/{$script_path}")) {
                echo "<!-- " . explode('/', $script_path)[1] . " -->";
                ?>
                <script src="<?php echo DOMAIN ?>/public/<?= $script_path ?>" defer></script>
                <?php
            }
        }
    }
?>