<?php

namespace GoGreat\CMSBaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontpageController extends Controller
{
	/**
	 * @return Symfony\Component\HttpFoundation\Request
	 */
	protected function getRequest() { return $this->get('request'); }
	
    public function indexAction()
    {
        return $this->render('CMSBase:Frontpage:index.html.php');
    }
    
    public function helloAction()
    {
    	
    	return $this->render('CMSBase:Frontpage:hello.html.php', array(
    		'name'		=> $this->getRequest()->get('name', 'World'),
    	));
    }
}
