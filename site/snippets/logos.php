<?php 
	$snippet = $pages->find('snippets');
?>
<?php if($logoa = $snippet->image($snippet->logo_a())) :?>
	<img class="media-logo" src="<?php echo $logoa->crop(200)->url() ?>" alt="<?php echo $logoa->alt_text() ?>" />
<?php endif ?>
<?php if($logob = $snippet->image($snippet->logo_b())) :?>
	<img class="media-logo" src="<?php echo $logob->crop(200)->url() ?>" alt="<?php echo $logob->alt_text() ?>" />
<?php endif ?>	

<?php if($logoc = $snippet->image($snippet->logo_c())) :?>
	<img class="media-logo" src="<?php echo $logoc->crop(200)->url() ?>" alt="<?php echo $logoc->alt_text() ?>" />
<?php endif ?>		
	
<?php if ($page->intendedTemplate() !== "home") { ?>	
	<?php if($logod = $snippet->image($snippet->logo_d())) :?>
		<img class="media-logo" src="<?php echo $logod->crop(200)->url() ?>" alt="<?php echo $logod->alt_text() ?>" />
	<?php endif ?>
<? } ?>