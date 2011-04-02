<ul>
	<? foreach($menuItems as $menuItem): ?>
	<li><a href="<?= $view['router']->generate($menuItem->getRouting(), $menuItem->getArguments()) ?>"><?= $menuItem->getTitle() ?></a></li>
	<? endforeach; ?>
</ul>