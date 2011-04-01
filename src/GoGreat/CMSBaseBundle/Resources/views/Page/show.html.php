<?php $view->extend('CMSBase::layout.html.php') ?>

<?php echo $page->content; ?>

<?php $view['slots']->start('_title') ?>
<?php echo $page->title; ?>
<?php $view['slots']->stop() ?>