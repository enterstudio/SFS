<?php snippet('header') ?>
<?php snippet('hero-default') ?>

<div class="section fill-white">
	<div class="row">
		<div class="colspan12-7 colspan16-11 as-grid-reverse">
			<article class="article article--single fill-white">
				<div class="is-typeset is-typeset--longform">
					<?php echo $page->text()->kirbytext() ?>
				</div>
				<div class="callout fill-vapour rule rule--all">
				<h4 class="as-heading-large as-heading-large--trailer">Case studies</h4>
					<ul class="as-nobullet-list">
						<?php snippet('children') ?>
					</ul>
				</div>
				<footer class="article__footer">
					<?php snippet('callout-contact') ?>
				</footer>
			</article>
		</div>
		<div class="colspan12-5 colspan16-5 as-grid-reverse">
			<aside class="aside">
				<div class="aside__m">
					<h3 class="as-heading-large as-heading-large--trailer">Our team</h3>
					<div class="aside__profiles">
						<?php 
							$img = $pages->find('about');
						?>
						<?php if($image = $img->image($img->profile_image1())) :?>
						<div class="aside__profile">
							<img class="media-square" src="<?php echo $image->crop(400, 400)->url() ?>" alt="<?php echo $image->alt_text() ?>"/>
							<span class="aside__profiles__name">Steve Nichols</span>
						</div>
						<?php endif ?>
						<?php if($image = $img->image($img->profile_image2())) :?>
						<div class="aside__profile">
							<img class="media-square" src="<?php echo $image->crop(400, 400)->url() ?>" alt="<?php echo $image->alt_text() ?>"/>
							<span class="aside__profiles__name">Martin Coles</span>
						</div>
						<?php endif ?>
					</div>
				</div>
				<?php 
					$cs = $page->case_study();
					$p = $pages->find('about');
					foreach($p->children()->shuffle()->limit(1)->visible() as $case): 
				?>
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