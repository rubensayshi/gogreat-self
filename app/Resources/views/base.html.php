<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php $view['slots']->output('_title', '[_title]') ?></title>
        <style>
        	body, * 		{ margin: 0px; padding: 0px; font-size: 11px; font-family: Arial; }
        	.container		{ width: 900px; margin: 0 auto; height: 100%; border: 1px solid black; }
        	.header			{ height: 60px; background-color: lightgray; }
        	.menu ul		{ list-style: none; padding: 0 10px; }
        	.menu ul li 	{ float: left; padding-right: 10px; }
        	.title			{ padding: 10px 0px; height: 20px; background-color: darkgray; color: gray; font-weight: bold; font-size: 20px; text-align: center; }
        	.content		{ min-height: 500px; }
        	.content-inner	{ width: 690px; float: left; min-height: 500px; padding: 5px;  }
        	.content-sidebar{ width: 189px; float: left; border-left: 1px solid black; min-height: 500px; padding: 5px; }
        	.clearfix		{ clear: both; height: 0px; }
        </style>
    </head>
    <body>
    	<div class="container">
    		<div class="header">
    			<div class="title">W E B S I T E</div>
    			<div class="menu"><?php echo $view['actions']->render('CMSBase:Menu:index') ?></div>
    		</div>
    		<div class="content">
    			<div class="content-inner"><?php $view['slots']->output('_content', '[_content]') ?></div>
    			<div class="content-sidebar"><?php echo $view['actions']->render('CMSBase:Sidebar:index') ?></div>
    			<div class="clearfix"></div>
    		</div>
    	</div>        
    </body>
</html>
