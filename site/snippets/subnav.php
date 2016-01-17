<?php 
	$items = false;
	if($root = $pages->findOpen()) {
		$items = $root->children()->visible();
	}
	if($items and $items->count()):
		foreach($items as $item):
?>
<li class="navigation-secondary__item <?php e($item->isOpen(), 'navigation-secondary__item--current"') ?>">
	<a href="<?php echo $item->url() ?>"><?php echo $item->title()->html() ?></a>
</li>
<?php endforeach; endif ?>