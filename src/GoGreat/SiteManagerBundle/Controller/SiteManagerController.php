<?php

namespace GoGreat\SiteManagerBundle\Controller;

use GoGreat\BaseBundle\Controller\BaseController;
use GoGreat\ServerBaseBundle\Form\WebsiteType;
use GoGreat\ServerBaseBundle\Entity\Website;

class SiteManagerController extends BaseController
{
    public function newAction()
    {   	
    	return $this->editAction();
    }
    
    public function editAction($id=null)
    {   	
    	$form 		= $this->get('form.factory')->create(new WebsiteType());
		$request 	= $this->get('request');
		
		$website = ($id) ? $this->getEntityManager()
    						->getRepository('GoGreat\ServerBaseBundle\Entity\Website')
    						->findOneById($id) : false;
    				
    	if(!$website)
			$website = new Website();
			
		$form->setData($website);
		
		if ($request->getMethod() == 'POST') {
			$form->bindRequest($request);

			if ($form->isValid()) {
				if(!$website->getUser())
					$website->setUser($this->getLoggedInUser());
				
				$this->getEntityManager()->persist($website);
				$this->getEntityManager()->flush();
				
				return $this->redirect($this->generateUrl('site_overview'));
			}
		}
		
        return $this->render('SiteManagerBundle:SiteManager:new.html.twig', array(
				'form'			=> $form->createView(),
		));
    }
    
    public function overviewAction()
    {
    	$websites = $this->getEntityManager()
    						->getRepository('GoGreat\ServerBaseBundle\Entity\Website')
    						->findByUser($this->getLoggedInUser()->getUsername());
		
        return $this->render('SiteManagerBundle:SiteManager:overview.html.twig', array(
				'websites'		=> $websites,
		));
    }
}
