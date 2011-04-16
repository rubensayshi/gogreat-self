<?php $view->extend('CMSBaseBundle::layout.html.php') ?>

<?php $view['slots']->start('_title') ?>
<?php echo "Control Panel :: Profile"; ?>
<?php $view['slots']->stop() ?>

Welcome to your profile `<?php echo $user->getUsername() ?>`. 

<p>
Acording to my ohsoawesome data your email is: <?php echo $user->getEmail() ?>. <br />
</p>