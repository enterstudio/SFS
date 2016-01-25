<?php snippet('header') ?>
<?php snippet('hero-home') ?>

<div class="section fill-vapour">
	<div class="row">
		<div class="colspan16-7 push16-1 as-grid">
			<section class="callout callout--pos1 fill-white">
				<h2 class="as-heading-large as-heading-large--trailer">Our services</h2>
				<div class="is-typeset">
					<?php echo $page->services_text()->kirbytext() ?>
					<?php snippet('services-menu') ?>
					<a href="/services/" class="text-link text-link--post-icon">Find out more</a>
				</div>
			</section>
		</div>
		<div class="colspan16-8 as-grid">
			<aside class="callout callout--logos push16-1">
				<h3 class="as-heading-large as-heading-large--trailer">Selected clients</h3>
				<?php snippet('logos') ?>
			</aside>
			<div class="callout--pos2 colspan16-6">
				<blockquote class="callout fill-miami as-blockquote">
					<p class="widont color-white"><?php echo $page->services_quote() ?></p>
				<?php if ($page->services_citation() !== "") { ?>
					<cite class="color-white"><?php echo $page->services_citation() ?></cite>
				<?php } ?>
				</blockquote>
			</div>
		</div>
	</div>
</div>

<?php 
	$img = $pages->find('home');
?>

<?php if($image = $img->image($img->section1_image())) :?>
<div class="section section--stack-lowz">
	<img class="section-banner" src="<?php echo $image->crop(1400, 600)->url() ?>" alt="<?php echo $image->alt_text() ?>"/>
</div>
<?php endif ?>

<div class="section section--about fill-vapour">
	<div class="row">
		<div class="colspan16-2 as-grid">
			<img class="media-square media-square--hp" src="http://filldunphy.com/i/400/400" alt=""/>
			<img class="media-square media-square--hp" src="http://filldunphy.com/i/400/400" alt=""/>
		</div>
		<div class="colspan16-7 as-grid">
			<section class="callout callout--pos3 fill-white">
				<h3 class="as-heading-large as-heading-large--trailer">About us</h3>
				<div class="is-typeset">
					<?php echo $page->about_text()->kirbytext() ?>
				</div>
				<a href="/about/" class="text-link text-link--post-icon">Find out more</a>
			</section>
		</div>
		<div class="colspan16-7 as-grid">
			<section class="callout callout--pos4 fill-deadpool align-center">
				<?php 
					$cs = $page->about_case_study();
					$p = $pages->find('about');
					foreach($p->children()->visible() as $case): 
				?>
				<?php if ($cs->uid() == $case->uid()) { ?>
					<h3 class="as-heading-large color-white">Case study: <?php echo $case->title(); ?></h3>
					<a href="<?php echo $case->url(); ?>" class="text-link text-link--post-icon">Read case study</a>
				<?php } ?>					
				<?php endforeach ?>
			</section>
		</div>
	</div>
</div>

<?php snippet('footer') ?>