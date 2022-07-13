<?php 
$seasons = $site->find('talks')->children()->sortBy('season', 'desc')->groupBy('season');
?>

<nav>
	<table>
		<?php foreach ($seasons as $season => $talks): ?>
			<tr>
				<th>SEASON <?= $season ?></th>
			</tr>
			<?php foreach ($talks->sortBy('date', 'desc') as $talk): ?>
			<?php
				if ($talk->pronouns()->isNotEmpty()):
					$pronoun = substr($talk->pronouns(), strpos($talk->pronouns(), "-") + 1); 
				else:
					$pronoun = "the";
				endif
			?>
				<tr>
					<td class="<?php echo 'season'.$talk->season() ?>">
						<a href="#<?= str_replace(' ', '', $talk->speaker()); ?>" aria-label="Read more about <?= $talk->speaker() ?> and <?= $pronoun ?> talk" class="accessible">
							<?= $talk->date()->toDate('d M Y'); ?> 
							<?= $talk->speaker(); ?>:
							<?= $talk->title() ?>
						</a>
					</td>
				</tr>
			<?php endforeach ?>
		<?php endforeach ?>
	</table>
</nav>