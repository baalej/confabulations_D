<?php 
if ($site->find('subscribe')->form()->isNotEmpty()):
	$action = $site->find('subscribe')->form();
else:
	$action = "#";
endif
?>

<?php if ($action != "#"): ?>
	<form action="<?= $action ?>" id="subscribe" method="post" id="mc-embedded-subscribe-form">
		<?= $site->find('subscribe')->message()->html() ?>
		<div id="form">
			<input type="email" name="EMAIL" value="" placeholder="Introduce your e-mail" class="input-text required email" id="mce-EMAIL">
			<button class="input-submit accessible" aria-label="Click on the button to subscribe to the newsletter">Subscribe</button>
		</div>
	</form>
<?php endif ?>