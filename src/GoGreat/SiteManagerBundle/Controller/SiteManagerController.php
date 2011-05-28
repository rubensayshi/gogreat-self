<?php

namespace GoGreat\SiteManagerBundle\Controller;

use GoGreat\BaseBundle\Controller\BaseController;
use GoGreat\ServerBaseBundle\Form\WebsiteType;
use GoGreat\ServerBaseBundle\Entity\Website;

class SiteManagerController extends BaseController
{
    public function newAction()
    {   	
    	$form 		= $this->get('form.factory')->create(new WebsiteType());
		$request 	= $this->get('request');
		$website	= new Website();
		$form->setData($website);
		
		if ($request->getMethod() == 'POST') {
			$form->bindRequest($request);

			if ($form->isValid()) {
				$this->getEntityManager()->persist($website);
				$this->getEntityManager()->flush();
			}
		}
		
        return $this->render('SiteManagerBundle:SiteManager:new.html.twig', array(
				'form'		=> $form->createView(),
		));
    }
    
    public function overviewAction()
    {
    	
    }
}
