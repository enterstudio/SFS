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
	</div>
</div>

<?php snippet('footer') ?>