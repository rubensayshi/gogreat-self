<?php $view->extend('CMSBaseBundle::layout.html.php') ?>

<?php $view['slots']->start('_title') ?>
<?php echo "Login"; ?>
<?php $view['slots']->stop() ?>

<h3><?php $view['slots']->output('_title', '[_title]') ?></h3>

<?php if ($error): ?>
    <div><?php echo $error->getMessage() ?></div>
<?php endif; ?>

<form action="<?php echo $view['router']->generate('_security_check') ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="_username" value="<?php echo $last_username ?>" /> <br />

    <label for="password">Password:</label>
    <input type="password" id="password" name="_password" /> <br />

    <?php /* ?>
        To set the target path via the form instead of the session:
        <input type="hidden" name="_target_path" value="/foo/bar" />
    <?php /**/?>

    <input type="submit" name="login" />
</form>
