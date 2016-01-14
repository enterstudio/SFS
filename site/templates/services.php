<?php snippet('header') ?>

<div class="section fill-deadpool padd-both">
	<div class="row">
		<div class="colspan12-7 colspan16-11 push12-5 push16-5">
			<h1 class="as-heading-headline as-heading-headline--trailer color-white">Help with funding</h1>
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
			</article>
		</div>
		<div class="colspan12-5 colspan16-5 as-grid-reverse">
			<aside class="aside">
				<div class="aside__m">
					<h3 class="as-heading-large as-heading-large--trailer">Our <?php echo $page->title()->html() ?></h3>
					<nav role="navigation" class="navigation-secondary">
						<ul class="navigation-secondary__items">
							<li class="navigation-secondary__item"><a href="">All <?php echo $page->title()->html() ?></a></li>
							<li class="navigation-secondary__item"><a href="">Help with funding</a></li>
							<li class="navigation-secondary__item"><a href="">Criteria compliance</a></li>
							<li class="navigation-secondary__item"><a href="">Project management</a></li>
						</ul>
					</nav>
				</div>
				<div class="aside__m">
					<div class="callout fill-miami">
						<h3 class="as-heading-small color-cotton">Case study</h3>
						<h3 class="color-white">Old Abotoinains FC</h3>
						<a href="" class="text-link text-link--post-icon">Read the case study</a>
					</div>
				</div>
			</aside>
		</div>
	</div>
</div>

<?php //echo $page->title()->html() ?>
<?php //echo $page->text()->kirbytext() ?>

<?php snippet('footer') ?>