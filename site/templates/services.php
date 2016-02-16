<?php snippet('header') ?>
<?php snippet('hero-default') ?>

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
			<h4 class="as-heading-large as-heading-large--trailer">We've worked with</h4>
		</div>
		<div class="colspan12-7 colspan16-11 as-grid">
			<?php snippet('logos') ?>
		</div>
	</div>
</div>

<?php snippet('service-quote') ?>
<?php snippet('footer') ?>