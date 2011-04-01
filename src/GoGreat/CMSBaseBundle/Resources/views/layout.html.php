<?php $view->extend('::base.html.php') ?>

<h3><?php $view['slots']->output('_title', '[_title]') ?></h3>

<?php $view['slots']->output('_content', '[_content]') ?>
