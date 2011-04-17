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
        return $this->render('CMSBaseBundle:Frontpage:index.html.twig');
    }
    
    public function helloAction()
    {
    	
    	return $this->render('CMSBaseBundle:Frontpage:hello.html.twig', array(
    		'name'		=> $this->getRequest()->get('name', 'World'),
    	));
    }
}
