	</main>	

<?php $footer_img = $pages->find('snippets'); ?>
	<footer class="footer fill-white" role="contentinfo">
	
	<?php if ($page->intendedTemplate() == "contact") { ?>
		<div class="row">
			<p class="footer__legal footer__legal--minor"><a href="/terms/">Terms &amp; Conditions</a> &copy; <?php echo $site->copyright()->html(); ?><?php echo html($site->address()); ?></p>
		
	<?php } else { ?>
		
			<?php if($image = $footer_img->image($footer_img->img_footer())) :?>
				<img class="footer__banner" src="<?php echo $image->crop(1400, 600)->url() ?>" alt="<?php echo $image->alt_text() ?>"/>
			<?php endif ?>
			
		<div class="row">
			<div class="colspan12-6 colspan16-7 as-grid">
				<div class="footer__contact fill-miami">
					<h6 class="as-heading-large as-heading-large--trailer color-white">Ask us a question</h6>
					<?php snippet('contact-form') ?>
				</div>
			</div>
			
			<div class="colspan12-5 push12-1 colspan16-8 push16-1 as-grid">
				<div class="footer__details">
					<h6 class="as-heading-large as-heading-large--trailer">Contact us</h6>
					<ul class="footer__list">
					<?php 
						if($site->contact_phone() != ""):
							echo "<li class='tel'><i class='icon icon--14 icon-tel-deadpool' aria-hidden='true'></i>";
							echo html($site->contact_phone()); 
							echo "</li>";
						endif;
						if($site->contact_email() != ""):
							echo "<li><i class='icon icon--14 icon-mail-deadpool' aria-hidden='true'></i><a href='mailto:";
							echo html($site->contact_email()); 
							echo "'>";
							echo html($site->contact_email()); 
							echo "</a></li>";
						endif; 
					?>
					</ul>
					<p class="footer__legal"><a href="/terms/">Terms &amp; Conditions</a> &copy; <?php echo $site->copyright()->html(); ?><?php echo html($site->address()); ?></p>
				</div>
			</div>
			
		<?php } ?>
			
		</div>
	</footer>
<?php echo js('static/assets/js/app.bundle.js') ?>
</body>
</html>