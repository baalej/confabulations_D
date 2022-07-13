<?php 
$seasons = $site->find('talks')->children()->sortBy('season', 'desc')->groupBy('season');
?>
<div id="back-to-menu">
	<a href="#top" aria-label="Back to top" class="accessible">
		<div id="clock-miniature" alt="<?= $site->find('clock')->sphere()->toFile()->alt() ?>">
			<img src="<?= $site->find('clock')->sphere()->toFile()->resize(512)->url() ?>" alt="<?= $site->find('clock')->sphere()->toFile()->alt() ?>" class="accessible">
			<img src="<?= $site->find('clock')->hours()->toFile()->resize(512)->url() ?>" id="miniature-hourhand" alt="<?= $site->find('clock')->hours()->toFile()->alt() ?>" class="accessible">
			<img src="<?= $site->find('clock')->minutes()->toFile()->resize(512)->url() ?>" id="miniature-minhand" alt="<?= $site->find('clock')->minutes()->toFile()->alt() ?>" class="accessible">
			<img src="<?= $site->find('clock')->seconds()->toFile()->resize(512)->url() ?>" id="miniature-sechand" alt="<?= $site->find('clock')->seconds()->toFile()->alt() ?>" class="accessible">
		</div>
	</a>
</div>

<main>
	<?php foreach ($seasons as $season => $talks): ?>
		<section>
			<h2>SEASON <?= $season ?></h2>
		<?php $index = 0; ?>
		<?php foreach ($talks->sortBy('date', 'desc') as $talk): ?>
			<article id="<?= str_replace(' ', '', $talk->speaker()); ?>">
				<h5><?= $talk->date()->toDate('d.m.Y'); ?> – <?= $talk->date()->toDate('G:i'); ?> EET</h5>
				<h3><?= $talk->title() ?></h3>
				<h4><?= $talk->speaker() ?></h4>
				<div class="description">
					<?= $talk->description()->kirbytext() ?>
				</div>
				<div class="biography">
					<?= $talk->bio()->kirbytext() ?>
				</div>
			</article>
			<?php $index++; ?>
			<?php if ($index < count($talks)): ?>
				<div class="divider"><?= str_repeat("&#8277;", $talk->season()->toInt()); ?></div>
			<?php endif ?>
		<?php endforeach ?>
		</section>
		<hr>
	<?php endforeach ?>
</main>