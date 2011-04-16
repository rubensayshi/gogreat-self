<?php $view->extend('CMSBaseBundle::layout.html.php') ?>

<?php $view['slots']->start('_title') ?>
<?php echo "Control Panel"; ?>
<?php $view['slots']->stop() ?>

Welcome to your control panel `<?php echo $user->getUsername() ?>`.