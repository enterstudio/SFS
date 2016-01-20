<nav class="navigation-primary" role="navigation">
	<ul class="navigation-primary__items">
		<?php foreach($pages->visible() as $p): ?>
			<li class="navigation-primary__item<?php e($p->isOpen(), ' navigation-primary__item--active') ?>">
				<a href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a>
			</li>
		<?php endforeach ?>
	</ul>
</nav>
