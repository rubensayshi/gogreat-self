<?php

namespace GoGreat\CMSBaseBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PageRepository extends EntityRepository
{
	/**
	 * persist an instance of Page with the entity_manager
	 * 
	 * @param Page $page
	 */
	public function persist(Page $page)
	{		
		$em = $this->getEntityManager();
		$em->persist($page);
	}
	
	/**
	 * remove an instance of Page with the entity_manager
	 * 
	 * @param Page $page
	 */
	public function remove(Page $page)
	{		
		$em = $this->getEntityManager();
		
		$menu_item = $em->getRepository('GoGreat\CMSBaseBundle\Entity\MenuItem')
						->findOneByIdentifier($page->getMenuIdentifier());
				
		if($menu_item)
			$em->remove($menu_item);
		
		$em->remove($page);
	}
}