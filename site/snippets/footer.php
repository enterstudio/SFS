	</main>	
	<footer class="footer" role="contentinfo">
		<!--
		<div class="footer__contact">
			<h6>Ask us a question</h6>
		</div>
		<div class="footer__details">
			<h6>Contact us</h6>
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
		-->
	</footer>
<?php echo js('static/assets/js/app.bundle.js') ?>
</body>
</html>