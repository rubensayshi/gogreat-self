<?php

namespace GoGreat\CMSBaseBundle\Controller;

use GoGreat\CMSBaseBundle\Form\PageType;

use GoGreat\CMSBaseBundle\Entity\Page;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception;
use GoGreat\BaseBundle\Controller\BaseController;

class PageController extends BaseController
{	
	private function isAdmin()
	{
        return ($this->getLoggedInUser() && in_array('ROLE_ADMIN', $this->getLoggedInUser()->getRoles()));
	}
	
    public function showAction($slug)
    {    	
    	$page = $this->getEntityManager()
    						->getRepository('GoGreat\CMSBaseBundle\Entity\Page')
							->findOneBySlug($slug);
		
    	if (!$page)
        	throw new Exception\NotFoundHttpException('The page does not exist.');
        	
        return $this->render('CMSBaseBundle:Page:show.html.twig', array(
        	'page'				=> $page,
        	'admin'				=> $this->isAdmin(),
        ));
    }
    
    public function editAction($slug)
    {
    	$form 		= $this->get('form.factory')->create(new PageType());
		$request 	= $this->get('request');
		
		$page = ($slug) ? $this->getEntityManager()
    						->getRepository('GoGreat\CMSBaseBundle\Entity\Page')
    						->findOneBySlug($slug) : false;
    				
    	if(!$page)
			$page = new Page();
			
		$form->setData($page);
		
		if ($request->getMethod() == 'POST') {
			$form->bindRequest($request);

			if ($form->isValid()) {
				$this->getEntityManager()
					 ->getRepository('GoGreat\CMSBaseBundle\Entity\Page')
					 ->persist($page);
					 
				$this->getEntityManager()
					 ->flush();
				
				return $this->redirect($this->generateUrl('page', array(
					'slug'		=> $page->getSlug()
				)));
			}
		}
		
        return $this->render('CMSBaseBundle:News:edit.html.twig', array(
				'form'			=> $form->createView(),
		));
    }
    
    public function deleteAction($slug)
    {    	
    	if (!$this->isAdmin())
        	throw new Exception\NotFoundHttpException('You do not have enough rights.');
    	    	
    	$page = $this->getEntityManager()
    						->getRepository('GoGreat\CMSBaseBundle\Entity\Page')
							->findOneBySlug($slug);
							
    	if (!$page)
        	throw new Exception\NotFoundHttpException('The page does not exist.');
        	
        if ($this->getRequest()->getMethod() != 'POST') 
        	throw new Exception\NotFoundHttpException('Delete action should be a POST request.');

       $this->getEntityManager()
    						->getRepository('GoGreat\CMSBaseBundle\Entity\Page')	
    						->remove($page);
        $this->getEntityManager()->flush();
    				
        $this->get('session')->flash('Deleted news article');
        
		return $this->redirect($this->generateUrl('homepage'));
    }
}
