<i>look at my sidebar!</i> <br />
<?php if($user): ?>
Hello <?php echo $user->getUsername() ?>!
<?php else: ?>
Maybe you should <a href="<?php echo $view['router']->generate('_security_login') ?>">login</a>?
<?php endif; ?>