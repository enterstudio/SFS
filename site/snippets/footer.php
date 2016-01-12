	</main>	
	<footer class="footer" role="contentinfo">
		<?php 
			echo "<ul>";
			if($site->contact_phone() != ""):
			echo "<li class='tel'>T: ";
			echo html($site->contact_phone()); 
			echo "</li>";
			endif;
			if($site->contact_email() != ""):
			echo "<li>E: <a href='mailto:";
			echo html($site->contact_email()); 
			echo "'>";
			echo html($site->contact_email()); 
			echo "</a></li>";
			endif; 
			if($site->address() != ""):
			echo "<li>A: ";
			echo html($site->address()); 
			echo "</li>";
			echo "</ul>";
			endif
		?>
		<?php echo $site->copyright()->kirbytext() ?>
	</footer>
<?php echo js('static/assets/js/app.bundle.js') ?>
</body>
</html>