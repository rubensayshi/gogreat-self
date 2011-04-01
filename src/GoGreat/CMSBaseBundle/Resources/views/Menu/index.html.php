<ul>
	<? foreach($menuItems as $menuItem): ?>
	<li><a href="<?= $view['router']->generate($menuItem['routing'], $menuItem['arguments']) ?>"><?= $menuItem['title'] ?></a></li>
	<? endforeach; ?>
</ul>