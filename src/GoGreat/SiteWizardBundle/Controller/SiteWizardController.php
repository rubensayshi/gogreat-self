<?php

namespace GoGreat\SiteWizardBundle\Controller;

use GoGreat\BaseBundle\Controller\BaseController;
use GoGreat\ServerBaseBundle\Form\WebsiteType;
use GoGreat\ServerBaseBundle\Entity\Website;

class SiteWizardController extends BaseController
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
				$em->persist($website);
			}
		}
		
        return $this->render('SiteWizardBundle:SiteWizard:new.html.twig', array(
				'form'		=> $form->createView(),
		));
    }
}
