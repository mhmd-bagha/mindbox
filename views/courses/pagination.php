<?php if (!empty($courses)): ?>
    <!-- pagination -->
<?= paginateView($courses, 20) ?>
<?php endif; ?>