<?php $view->extend('CMSBaseBundle::layout.html.php') ?>

<?php $view['slots']->start('_title') ?>
Hello World Example
<?php $view['slots']->stop() ?>

<h3><?php $view['slots']->output('_title', '[_title]') ?></h3>

Hello, <?php echo $name ?>
