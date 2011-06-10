<?php

namespace GoGreat\CMSBaseBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception;
use GoGreat\BaseBundle\Controller\BaseController;

class NewsController extends BaseController
{	
	private function isAdmin()
	{
        return ($this->getLoggedInUser() && in_array('ROLE_ADMIN', $this->getLoggedInUser()->getRoles()));
	}
	
    public function indexAction()
    {    	
    	$newsArticles = $this->getEntityManager()
    						->getRepository('GoGreat\CMSBaseBundle\Entity\NewsArticle')
							->findAll();
		
    	if (!$newsArticles)
        	throw new Exception\NotFoundHttpException('No news articles found.');
        	
        return $this->render('CMSBaseBundle:News:index.html.twig', array(
        	'newsArticles'		=> $newsArticles,
        	'admin'				=> $this->isAdmin(),
        ));
    }
	
    public function showAction($slug)
    {      	
    	$newsArticle = $this->getEntityManager()
    						->getRepository('GoGreat\CMSBaseBundle\Entity\NewsArticle')
							->findOneBySlug($slug);
		
    	if (!$newsArticle)
        	throw new Exception\NotFoundHttpException('The news article does not exist.');
        	
        return $this->render('CMSBaseBundle:News:show.html.twig', array(
        	'newsArticle'		=> $newsArticle,
        	'admin'				=> $this->isAdmin(),
        ));
    }

    public function saveAction($slug)
    {
    	if (!$this->isAdmin())
        	throw new Exception\NotFoundHttpException('You do not have enough rights.');
    	    	
    	$newsArticle = $this->getEntityManager()
    						->getRepository('GoGreat\CMSBaseBundle\Entity\NewsArticle')
							->findOneBySlug($slug);
							
    	if (!$newsArticle)
        	throw new Exception\NotFoundHttpException('The news article does not exist.');
        	
        if ($this->getRequest()->getMethod() != 'POST') 
        	throw new Exception\NotFoundHttpException('Save action should be a POST request.');

        if($title = $this->getRequest()->get('title'))
        	$newsArticle->setTitle($title);
        	
        if($content = $this->getRequest()->get('content'))
        	$newsArticle->setContent($content);
        
        $this->getEntityManager()->persist($newsArticle);
        $this->getEntityManager()->flush();
    	
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
    	    	
    	$newsArticle = $this->getEntityManager()
    						->getRepository('GoGreat\CMSBaseBundle\Entity\NewsArticle')
							->findOneBySlug($slug);
							
    	if (!$newsArticle)
        	throw new Exception\NotFoundHttpException('The news article does not exist.');
        	
        if ($this->getRequest()->getMethod() != 'POST') 
        	throw new Exception\NotFoundHttpException('Delete action should be a POST request.');

       $this->getEntityManager()
    						->getRepository('GoGreat\CMSBaseBundle\Entity\NewsArticle')	
    						->remove($newsArticle);
        $this->getEntityManager()->flush();
    						
    	return new Response(json_encode(array(
    		'result' 		=> true, 
    		'redirect'		=> $this->generateUrl('news', array(), true),
    		'errors' 		=> array(),
    	)));
    }
}
