<?php snippet('header') ?>
<?php snippet('hero-default') ?>

<div class="section fill-white">
	<div class="row">
		<div class="colspan12-7 colspan16-11 as-grid-reverse">
			<article class="article article--single fill-white">
				<?php snippet('contact-form') ?>
			</article>
		</div>
		<div class="colspan12-5 colspan16-5 as-grid-reverse">
			<aside class="aside">
				<div class="aside__m">
					<h3 class="as-heading-large as-heading-large--trailer">Get in touch</h3>
					<ul class="aside__list">
						<?php 
							if($site->contact_phone() != ""):
								echo "<li class='tel'><i class='icon icon--14 icon-tel-deadpool' aria-hidden='true'></i><span>";
								echo html($site->contact_phone()); 
								echo "</span></li>";
							endif;
							if($site->contact_email() != ""):
								echo "<li><i class='icon icon--14 icon-mail-deadpool' aria-hidden='true'></i><a href='mailto:";
								echo html($site->contact_email()); 
								echo "'>Send an email</a></li>";
							endif; 
						?>
					</ul>
				</div>
			</aside>
		</div>
	</div>
</div>

<?php snippet('footer') ?>