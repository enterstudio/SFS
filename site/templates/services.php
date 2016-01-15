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
				<footer class="article__footer callout callout--pair fill-deadpool">
					<h3 class="as-heading-large color-white widont">Find out how we can help</h3>
					<div class="callout__cta">
						<a href="/contact/" class="button button--secondary">Contact us</a>
					</div>
				</footer>
			</article>
		</div>
		<div class="colspan12-5 colspan16-5 as-grid-reverse">
			<aside class="aside">
				<div class="aside__m">
					<h3 class="as-heading-large as-heading-large--trailer">What we offer</h3>
					<nav role="navigation" class="navigation-secondary">
						<ul class="navigation-secondary__items">
							<li class="navigation-secondary__item navigation-secondary__item--current"><a href="">All <?php echo $page->title() ?></a></li>
							<li class="navigation-secondary__item"><a href="">Help with funding</a></li>
							<li class="navigation-secondary__item"><a href="">Criteria compliance</a></li>
							<li class="navigation-secondary__item"><a href="">Project management</a></li>
						</ul>
					</nav>
				</div>
				<div class="aside__m">
					<div class="callout fill-miami">
						<h3 class="as-heading-small color-cotton">Case study</h3>
						<h3 class="color-white">Old Abbotonains FC</h3>
						<a href="" class="text-link text-link--post-icon">Read case study</a>
					</div>
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
	</div>
</div>

<?php if ($page->service_quote() !== "") { ?>
	<div class="section fill-white">
		<div class="row padd-both rule rule--overline">
			<blockquote class="as-blockquote">
				<p class="widont"><?php echo $page->service_quote() ?></p>
			<?php if ($page->service_citation() !== "") { ?>
				<cite><?php echo $page->service_citation() ?></cite>
			<?php } ?>
			</blockquote>
		</div>
	</div>
<?php } ?>

<?php snippet('footer') ?>