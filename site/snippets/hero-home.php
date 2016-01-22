<?php 
	$img = $pages->find('home');
?>
<div class="hero hero--split fill-deadpool">
<?php if($image = $img->image($img->hero_image())) :?>
	<aside class="hero__tile" style="background-image: url(<?php echo $image->crop(1280, 1100)->url() ?>);"></aside>
<?php endif ?>
	<div class="hero__tile">
		<div class="hero__tile__content">
			<h1 class="as-heading-headline as-heading-headline--trailer color-white"><?php echo $site->title() ?></h1>
			<p class="as-para color-white widont"><?php echo $page->hero_text()->html() ?></p>
		</div>
	</div>
</div>