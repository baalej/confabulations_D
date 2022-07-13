<?php snippet('header') ?>

<?php if($site->find('stream')->launch()->toBool()): ?>
	<?php snippet('stream') ?>
<?php else: ?>
	<?php snippet('clock') ?>
<?php endif ?>
<?php snippet('table') ?>
<hr>
<?php snippet('subscribe') ?>
<hr>
<?php snippet('body') ?>
<?php snippet('footer') ?>
