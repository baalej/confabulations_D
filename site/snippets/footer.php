	<footer>
		<div class="columns-wrapper">
			<div class="column">
				<h5>About</h5>
				<?= $site->find('information')->about()->kirbyText(); ?>
				<h5>Access</h5>
				<?= $site->find('information')->access()->kirbyText(); ?>
			</div>
			<div class="column">
				<h5>Colophon</h5>
				<?= $site->find('information')->colophon()->kirbyText(); ?>
				<div id="logos">
					<?php $logos = $site->find('information')->logos()->toFiles(); ?>
					<?php foreach($logos as $logo): ?>
						<img src="<?= $logo->url() ?>" alt="<?= $logo->alt() ?>" class="accessible">
					<?php endforeach ?>
				</div>
			</div>
		</div>
		<a href="#top" aria-label="Go back to the top of the page" class="accessible">Back to top</a>
	</footer>
	<div id="accessibility-messages">
		<div id="alt"></div>
		<div id="aria"></div>
	</div>
</body>
</html>