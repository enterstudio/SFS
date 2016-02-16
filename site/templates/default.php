<?php snippet('header') ?>
<?php snippet('hero-default') ?>

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
			<?php 
				$cs = $page->case_study();
				$p = $pages->find('about');
				foreach($p->children()->shuffle()->limit(1)->visible() as $case): 
			?>
			<aside class="aside">
				<div class="aside__m">
					<div class="callout fill-miami">
						<h3 class="as-heading-small color-cotton">Featured case study</h3>
						<h3 class="color-white"><?php echo $case->title(); ?></h3>
						<a href="<?php echo $case->url(); ?>" class="text-link text-link--post-icon">Read case study</a>
					</div>
				</div>
				<?php endforeach ?>
			</aside>
		</div>
	</div>
</div>


<?php snippet('footer') ?>