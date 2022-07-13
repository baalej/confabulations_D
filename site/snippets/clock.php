<?php
$upcoming = $site->find('talks')->children()->sortBy('date', 'asc')->filter(function ($child) {
  return $child->date()->toDate() > time();
});
?>

<div name="top" id="clock-wrapper">
	<?php if ($upcoming->isNotEmpty()): ?>
		<div id="upcoming">
			<span class="red">Upcoming</span><br>
			<?= $upcoming->first()->date()->toDate('d F Y'); ?> at <?= $upcoming->first()->date()->toDate('H'); ?> EET<br>
			<?= $upcoming->first()->speaker(); ?>: <?= $upcoming->first()->title(); ?>
		</div>
	<?php endif ?>
	<div class="clock">
			<img src="<?= $site->find('clock')->sphere()->toFile()->url() ?>" alt="<?= $site->find('clock')->sphere()->toFile()->alt() ?>" class="accessible">
			<img src="<?= $site->find('clock')->hours()->toFile()->url() ?>" id="hourhand" alt="<?= $site->find('clock')->hours()->toFile()->alt() ?>" class="accessible">
			<img src="<?= $site->find('clock')->minutes()->toFile()->url() ?>" id="minhand" alt="<?= $site->find('clock')->minutes()->toFile()->alt() ?>" class="accessible">
			<img src="<?= $site->find('clock')->seconds()->toFile()->url() ?>" id="sechand" alt="<?= $site->find('clock')->seconds()->toFile()->alt() ?>" class="accessible">
	</div>
</div>