<?php $view->extend('CMSBaseBundle::layout.html.php') ?>

<?php $view['slots']->start('_title') ?>
<?php echo "Control Panel"; ?>
<?php $view['slots']->stop() ?>

<h3><?php $view['slots']->output('_title', '[_title]') ?></h3>

Welcome to your control panel `<?php echo $user->getUsername() ?>`.