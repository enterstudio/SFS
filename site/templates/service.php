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
					<h3 class="as-heading-large as-heading-large--trailer">Our <?php echo $page->parent()->title() ?></h3>
					<nav role="navigation" class="navigation-secondary">
						<ul class="navigation-secondary__items">
							<li class="navigation-secondary__item"><a href="/services/">All services</a></li>
							<?php snippet('subnav') ?>
						</ul>
					</nav>
				</div>
				<?php 
					$cs = $page->case_study();
					$p = $pages->find('about');
					foreach($p->children()->visible() as $case): 
				?>
				<?php if ($cs->uid() == $case->uid()) { ?>
					<div class="aside__m">
						<div class="callout fill-miami">
							<h3 class="as-heading-small color-cotton">Case study</h3>
							<h3 class="color-white"><?php echo $case->title(); ?></h3>
							<a href="<?php echo $case->url(); ?>" class="text-link text-link--post-icon">Read case study</a>
						</div>
					</div>
				<?php } ?>					
				<?php endforeach ?>
			</aside>
		</div>
	</div>
</div>

<?php snippet('service-quote') ?>
<?php snippet('footer') ?>