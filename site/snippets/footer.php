	</main>	
	<footer class="footer fill-white" role="contentinfo">
		<img class="footer__banner" src="http://filldunphy.com/1400/600" alt=""/>
		<div class="row">
			<div class="colspan12-6 colspan16-7 as-grid">
				<div class="footer__contact fill-miami">
					<h6 class="as-heading-large color-white">Ask us a question</h6>
					<p class="color-cotton">Sporting Partnerships Financial Services Advisers all share and adhere to our company standards, training and compliance requirements and our client promise.</p>
					<?php snippet('contact-form') ?>
				</div>
			</div>
			<div class="colspan12-5 push12-1 colspan16-8 push16-1 as-grid">
				<div class="footer__details">
					<h6 class="as-heading-large">Contact us</h6>
					<ul class="footer__list footer__list--contact-details">
					<?php 
						if($site->contact_phone() != ""):
							echo "<li class='tel'><i class='icon' aria-hidden='true'></i>";
							echo html($site->contact_phone()); 
							echo "</li>";
						endif;
						if($site->contact_email() != ""):
							echo "<li><i class='icon' aria-hidden='true'></i><a href='mailto:";
							echo html($site->contact_email()); 
							echo "'>";
							echo html($site->contact_email()); 
							echo "</a></li>";
						endif; 
					?>
					</ul>
					<p class="footer__legal"><?php echo $site->copyright()->kirbytext(); ?><?php echo html($site->address()); ?></p>
				</div>
			</div>
		</div>
	</footer>
<?php echo js('static/assets/js/app.bundle.js') ?>
</body>
</html>