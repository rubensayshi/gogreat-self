<?php

namespace GoGreat\CMSBaseBundle\Controller;

use GoGreat\CMSBaseBundle\Entity\NewsArticle;

use GoGreat\CMSBaseBundle\Form\NewsArticleType;

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
        	
        foreach($newsArticles as $newsArticle) {
	        if($image = $newsArticle->getImage()) {
	        	$newsArticle->setImage('uploads/' . $image);
	        }
        }
        	
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

        if($image = $newsArticle->getImage()) {
        	$newsArticle->setImage('uploads/' . $image);
        }
        	
        return $this->render('CMSBaseBundle:News:show.html.twig', array(
        	'newsArticle'		=> $newsArticle,
        	'admin'				=> $this->isAdmin(),
        ));
    }
    
    public function editAction($slug)
    {
    	$form 		= $this->get('form.factory')->create(new NewsArticleType());
		$request 	= $this->get('request');
		
		$newsArticle = ($slug) ? $this->getEntityManager()
    						->getRepository('GoGreat\CMSBaseBundle\Entity\NewsArticle')
    						->findOneBySlug($slug) : false;
    				
    	if(!$newsArticle)
			$newsArticle = new NewsArticle();
			
		$form->setData($newsArticle);
		
		if ($request->getMethod() == 'POST') {
			$form->bindRequest($request);

			if ($form->isValid()) {
				$this->getEntityManager()
					 ->getRepository('GoGreat\CMSBaseBundle\Entity\NewsArticle')
					 ->persist($newsArticle);
					 
				$this->getEntityManager()
					 ->flush();
				
				return $this->redirect($this->generateUrl('news'));
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
    	    	
    	$newsArticle = $this->getEntityManager()
    						->getRepository('GoGreat\CMSBaseBundle\Entity\NewsArticle')
							->findOneBySlug($slug);
							
    	if (!$newsArticle)
        	throw new Exception\NotFoundHttpException('The news article does not exist.');

       $this->getEntityManager()
    						->getRepository('GoGreat\CMSBaseBundle\Entity\NewsArticle')	
    						->remove($newsArticle);
        $this->getEntityManager()->flush();

        $this->get('session')->setFlash('Deleted news article');
        
		return $this->redirect($this->generateUrl('news'));
    }
}
