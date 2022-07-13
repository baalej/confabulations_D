<?php if ($site->find('stream')->background()->isNotEmpty()):
	$bgcolor = "#{$site->find('stream')->background()}";
else: 
	$bgcolor = "#696969";
endif ?>
<?php if ($site->find('stream')->video()->isNotEmpty()):
	$stream = $site->find('stream')->video();
else: 
	$stream = "Je8wxnoEkug";
endif ?>
<div id="stream-wrapper" style="background-color: <?= $bgcolor ?>">
	<div id="stream">
		<div id="video">
			<div class="iframe-container">
				<iframe src="https://www.youtube.com/embed/<?= $stream ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
		<?php if ($site->find('stream')->chat()->isNotEmpty()): ?>
		<div id="chat">
			<?= $site->find('stream')->chat(); ?>
		</div>
		<?php endif ?>
	</div>
</div>