<?php

namespace GoGreat\CMSBaseBundle\Controller;

use Symfony\Component\HttpKernel\Exception;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
	/**
	 * @return GoGreat\UserBundle\Entity\User
	 */
	private function getLoggedInUser()
	{    
		$user = ($this->get('security.context')->getToken()) ? $this->get('security.context')->getToken()->getUser() : null;
    	$user = (is_object($user) ? $user : null);
    	
		return $user;
	}
	
	/**
	 * @return Symfony\Component\HttpFoundation\Request
	 */
	protected function getRequest() { return $this->get('request'); }

	/**
	 * @return Doctrine\ORM\EntityManager
	 */
	protected function getEntityManager() { return $this->get('doctrine.orm.entity_manager'); }
	
    public function showAction()
    {
    	$slug = $this->getRequest()->get('slug');
    	
    	$page = $this->getEntityManager()
    						->getRepository('GoGreat\CMSBaseBundle\Entity\Page')
							->findOneBySlug($slug);
		
    	if(!$page)
        	throw new Exception\NotFoundHttpException('The page does not exist.');
        	
        $admin = ($this->getLoggedInUser() && in_array('ROLE_ADMIN', $this->getLoggedInUser()->getRoles()));
    	
        return $this->render('CMSBaseBundle:Page:show.html.twig', array(
        	'page'				=> $page,
        	'admin'				=> $admin,
        ));
    }
}
