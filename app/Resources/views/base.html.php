<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php $view['slots']->output('_title', '[_title]') ?></title>
        <style>
        	/*
        		colors:
				  background:		Magnolia Mag.nolia [#F9F7ED]
 				  divs:				Qoop Mint [#CDEB8B]
				  text:				Shadows Grey [#36393D]
				  borders:			Shadows Grey [#36393D]
 				  headerdivs:		Basecamp Green [#6BBA70]
 				  headertext:		Shadows Grey [#36393D]
 				  headerborders:	Shadows Grey [#36393D]
 				  links:			Shadows Grey [#36393D]
 				  links, hover:		Mozilla Blue [#3F4C6B]
        	*/
        	html, body, div, span, applet, object, iframe,
			h1, h2, h3, h4, h5, h6, p, blockquote, pre,
			a, abbr, acronym, address, big, cite, code,
			del, dfn, em, font, img, ins, kbd, q, s, samp,
			small, strike, strong, sub, sup, tt, var,
			dl, dt, dd, ol, ul, li,
			fieldset, form, label, legend,
			table, caption, tbody, tfoot, thead, tr, th, td {
				margin: 0;
				padding: 0;
				border: 0;
				outline: 0;
				font-weight: inherit;
				font-style: inherit;
				font-size: 100%;
				font-family: inherit;
				vertical-align: baseline;
			}
			 
			body 			{ font-family: verdana, helvetica, arial, sans-serif; font-size: 12px; margin: 5px; background-color: #F9F7ED; color: #36393D; }
			@font-face 		{ font-family: 'aller-display'; src: url('/self/aller-display.ttf'); }  
			@font-face 		{ font-family: 'aller-display'; src: url('/self/aller-display.ttf'); font-weight: bold; }  
        	a, a:visited	{ color: #36393D; font-decoration: underline; }
        	a:hover			{ color: #3F4C6B; font-decoration: underline; }
        	h1, h2, h3		{ font-family: 'aller-display'; font-weight: bold }
        	h1				{ font-size: 200% }
        	h2				{ font-size: 175% }
        	h3				{ font-size: 150% }
        	.container		{ width: 900px; margin: 0 auto; height: 100%; }
        	.header			{ height: 60px; background-color: #6BBA70; -moz-border-radius: 5px; -webkit-border-radius: 5px; border: 1px solid #36393D; color: #36393D; margin-bottom: 5px; }
        	.menu ul		{ list-style: none; padding: 0 10px; }
        	.menu ul li 	{ float: left; padding-right: 10px; }
        	.title			{ padding: 10px 0px; height: 20px; text-align: center; }
        	.content		{ min-height: 500px; -moz-border-radius: 5px; -webkit-border-radius: 5px; border: 1px solid #36393D; background-color: #CDEB8B; }
        	.content-inner	{ width: 680px; float: left; min-height: 500px; padding: 5px;  }
        	.content-sidebar{ width: 189px; float: left; border-left: 1px solid #36393D; min-height: 500px; padding: 5px; }
        	.clearfix		{ clear: both; height: 0px; }
        </style>
    </head>
    <body>
    	<div class="container">
    		<div class="header">
    			<div class="title font"><h1>W E B S I T E</h1></div>
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
