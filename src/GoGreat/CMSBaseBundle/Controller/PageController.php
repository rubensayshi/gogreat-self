<?php

namespace GoGreat\CMSBaseBundle\Controller;

use Symfony\Component\HttpKernel\Exception;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
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
							->findBySlug($slug);
		$page = reset($page);
		
    	if(!$page)
        	throw new Exception\NotFoundHttpException('The page does not exist.');
    	
        return $this->render('CMSBase:Page:show.html.php', array(
        	'page'				=> $page,
        ));
    }
}
