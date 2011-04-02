<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php $view['slots']->output('_title', '[_title]') ?></title>
		<link href="<?php echo $view['assets']->getUrl('css/style.css') ?>" rel="stylesheet" type="text/css" />
    </head>
    <body>
    	<div class="container">
    		<div class="header">
    			<div class="title font"><h1>WEBSITE</h1></div>
    			<div class="menu"><?php echo $view['menu']->render('main') ?></div>
    		</div>
    		<div class="content">
    			<div class="content-inner"><?php $view['slots']->output('_content', '[_content]') ?></div>
    			<div class="content-sidebar"><?php echo $view['actions']->render('CMSBase:Sidebar:index') ?></div>
    			<div class="clearfix"></div>
    		</div>
    	</div>        
    </body>
</html>
