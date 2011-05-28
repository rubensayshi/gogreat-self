<?php

namespace GoGreat\CMSBaseBundle\Controller;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
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

    public function saveAction($slug)
    {
    	if (!$this->isAdmin())
        	throw new Exception\NotFoundHttpException('You do not have enough rights.');
    	    	
    	$page = $this->getEntityManager()
    						->getRepository('GoGreat\CMSBaseBundle\Entity\Page')
							->findOneBySlug($slug);
							
    	if (!$page)
        	throw new Exception\NotFoundHttpException('The page does not exist.');
        	
        if ($this->getRequest()->getMethod() != 'POST') 
        	throw new Exception\NotFoundHttpException('Save action should be a POST request.');

        if($title = $this->getRequest()->get('title'))
        	$page->setTitle($title);
        	
        if($content = $this->getRequest()->get('content'))
        	$page->setContent($content);
        
        $this->getEntityManager()
    						->getRepository('GoGreat\CMSBaseBundle\Entity\Page')	
    						->persist($page);
    	
    	return new Response(json_encode(array(
    		'result' 		=> true, 
    		'redirect'		=> false,
    		'errors' 		=> array(),
    	)));
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
    						
    	return new Response(json_encode(array(
    		'result' 		=> true, 
    		'redirect'		=> $this->generateUrl('homepage', array(), true),
    		'errors' 		=> array(),
    	)));
    }
}
