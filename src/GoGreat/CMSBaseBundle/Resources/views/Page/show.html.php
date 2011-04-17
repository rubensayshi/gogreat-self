<?php $view->extend('CMSBaseBundle::layout.html.php') ?>

<?php $view['slots']->start('_title') ?>
<?php echo $page->getTitle(); ?>
<?php $view['slots']->stop() ?>

<div class="editable_container">
	<?php if($admin): ?>
		<div class="admin">
			<a href="#edit" class="editable_edit"> <img src="<?php echo $view['assets']->getUrl('images/icons/page_edit.png') ?>" /> </a>
			<a href="#delete"> <img src="<?php echo $view['assets']->getUrl('images/icons/page_delete.png') ?>" /> </a>
		</div>
	<?php endif; ?>
	<h3 class="editable"><?php $view['slots']->output('_title', '[_title]') ?></h3>
	
	<div class="editable" style="min-height: 300px;"><?php echo $page->getContent(); ?></div>
</div>
