<?php $view->extend('CMSBaseBundle::layout.html.php') ?>

<?php $view['slots']->start('_title') ?>
<?php echo "Control Panel :: Edit Profile"; ?>
<?php $view['slots']->stop() ?>

<h3><?php $view['slots']->output('_title', '[_title]') ?></h3>

Edit your profile `<?php echo $user->getUsername() ?>`.
<form action="#" method="post" <?php echo $view['form']->enctype($form) ?>>
    <?php echo $view['form']->errors($form) ?>

	<?php foreach($form as $field): 
			if(!$field->isHidden()): ?>
		<div>
			<?php echo $view['form']->errors($field); ?>
			<?php echo $view['form']->label($field); ?>
			<?php echo $view['form']->render($field); ?>
			
		</div>
	<?php 	endif;
		endforeach; ?> 
		
    <?php echo $view['form']->hidden($form) ?>
    <input type="submit" />
</form>