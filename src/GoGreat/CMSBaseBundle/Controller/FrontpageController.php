<?php

namespace GoGreat\CMSBaseBundle\Controller;

use GoGreat\BaseBundle\Controller\BaseController;

class FrontpageController extends BaseController
{
	/**
	 * @return Symfony\Component\HttpFoundation\Request
	 */
	protected function getRequest() { return $this->get('request'); }
	
    public function indexAction()
    {
        return $this->render('CMSBaseBundle:Frontpage:index.html.twig');
    }
    
    public function helloAction()
    {
    	
    	return $this->render('CMSBaseBundle:Frontpage:hello.html.twig', array(
    		'name'		=> $this->getRequest()->get('name', 'World'),
    	));
    }
}
