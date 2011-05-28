<?php

namespace GoGreat\CMSBaseBundle\Controller;

use GoGreat\BaseBundle\Controller\BaseController;

class FrontpageController extends BaseController
{	
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
