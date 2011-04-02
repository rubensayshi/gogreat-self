<?php

namespace GoGreat\CMSBaseBundle\Controller;

use GoGreat\CMSBaseBundle\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller
{
	/**
	 * @return Doctrine\ORM\EntityManager
	 */
	protected function getEntityManager() { return $this->get('doctrine.orm.entity_manager'); }
	
    public function indexAction()
    {    	
    	$menuItems = $this	->getEntityManager()
    						->getRepository('GoGreat\CMSBaseBundle\Entity\MenuItem')
    						->findAll();
    	
        return $this->render('CMSBase:Menu:index.html.php', array(
        	'menuItems'		=> $menuItems
        ));
    }
}