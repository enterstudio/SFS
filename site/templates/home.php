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

<?php snippet('footer') ?>