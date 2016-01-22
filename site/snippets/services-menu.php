<ul class="as-list-styled-bullets">
<?php foreach($pages->find('services')->children()->visible() as $item): ?>
	<li><a href="<?php echo $item->url() ?>"><?php echo $item->title()->html() ?></a></li>
<?php endforeach?>
</ul>