<?php snippet('header') ?>

<div class="hero hero--default fill-deadpool">
	<div class="row">
		<div class="colspan12-7 colspan16-11 push12-5 push16-5">
			<h1 class="as-heading-headline as-heading-headline--trailer color-white"><?php echo $page->title() ?></h1>
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
					<h3 class="as-heading-large as-heading-large--trailer">Our <?php echo $page->parent()->title() ?></h3>
					<nav role="navigation" class="navigation-secondary">
						<ul class="navigation-secondary__items">
							<?php 
								$items = false;
								if($root = $pages->findOpen()) {
									$items = $root->children()->visible();
								}
								if($items and $items->count()):
									foreach($items as $item):
							?>
							<li class="navigation-secondary__item <?php e($item->isOpen(), 'navigation-secondary__item--current"') ?>">
								<a href="<?php echo $item->url() ?>"><?php echo $item->title()->html() ?></a>
							</li>
							<?php endforeach; endif ?>
						</ul>
					</nav>
				</div>
				<?php 
					$cs = $page->case_study();
					$p = $pages->find('about');
					foreach($p->children()->visible() as $article): 
				?>
				<?php if ($cs->uid() == $article->uid()) { ?>
					<div class="aside__m">
						<div class="callout fill-miami">
							<h3 class="as-heading-small color-cotton">Case study</h3>
							<h3 class="color-white"><?php echo $article->title(); ?></h3>
							<a href="<?php echo $article->url(); ?>" class="text-link text-link--post-icon">Read case study</a>
						</div>
					</div>
				<?php } ?>					
				<?php endforeach ?>
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