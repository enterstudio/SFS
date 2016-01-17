<?php if (!$page->service_quote()->empty()) { ?>
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