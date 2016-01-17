<?php snippet('header') ?>

<div class="hero hero--default fill-deadpool">
	<div class="row">
		<div class="colspan12-7 colspan16-11 push12-5 push16-5">
			<h1 class="as-heading-headline as-heading-headline--trailer color-white">Our <?php echo $page->title() ?></h1>
		</div>
	</div>
</div>

<div class="section fill-white">
	<div class="row">
		<div class="colspan12-7 colspan16-11 as-grid-reverse">
			<article class="article article--single fill-white">
				<div class="is-typeset is-typeset--longform">
					<?php echo $page->text()->kirbytext() ?>
				</div>
				<footer class="article__footer">
					<?php snippet('callout-contact') ?>
				</footer>
			</article>
		</div>
		<div class="colspan12-5 colspan16-5 as-grid-reverse">
			<aside class="aside">
				<div class="aside__m">
					<h3 class="as-heading-large as-heading-large--trailer">What we offer</h3>
					<nav role="navigation" class="navigation-secondary">
						<ul class="navigation-secondary__items">
							<li class="navigation-secondary__item navigation-secondary__item--current">
								<a href="/services/">All services</a>
							</li>
							<?php snippet('subnav') ?>
						</ul>
					</nav>
				</div>
			</aside>
		</div>
	</div>
</div>

<div class="section fill-white">
	<div class="row padd-both rule rule--overline">
		<div class="colspan12-5 colspan16-5 as-grid">
			<h4 class="as-heading-large as-heading-large--trailer">Who we work with</h4>
		</div>
		<div class="colspan12-7 colspan16-11 as-grid">
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
			<?php if($logod = $snippet->image($snippet->logo_d())) :?>
				<img class="media-logo" src="<?php echo $logod->crop(200)->url() ?>" alt="<?php echo $logod->alt_text() ?>" />
			<?php endif ?>
		</div>
	</div>
</div>

<?php snippet('service-quote') ?>

<?php snippet('footer') ?>