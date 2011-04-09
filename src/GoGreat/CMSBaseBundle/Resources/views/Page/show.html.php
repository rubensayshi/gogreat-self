<?php $view->extend('CMSBaseBundle::layout.html.php') ?>

<?php echo $page->getContent(); ?>

<?php $view['slots']->start('_title') ?>
<?php echo $page->getTitle(); ?>
<?php $view['slots']->stop() ?>