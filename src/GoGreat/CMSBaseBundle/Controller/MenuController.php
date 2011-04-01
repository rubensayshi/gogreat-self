<?php

namespace GoGreat\CMSBaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller
{
	protected $menuItems = array(
		array(
			'title'		=> 'Homepage',
			'routing'	=> 'homepage',
			'arguments'	=> array()
		),
		array(
			'title'		=> 'Hello Ben',
			'routing'	=> 'hello',
			'arguments'	=> array('name' => 'Ben')
		),
	);
	
    public function indexAction()
    {
        return $this->render('CMSBase:Menu:index.html.php', array(
        	'menuItems'		=> $this->menuItems
        ));
    }
}