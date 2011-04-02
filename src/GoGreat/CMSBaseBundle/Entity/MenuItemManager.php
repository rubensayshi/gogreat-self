<?php

namespace GoGreat\CMSBaseBundle\Entity;
use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * GoGreat\CMSBaseBundle\Entity\MenuItemManager
 */
class MenuItemManager extends ContainerAware
{
	/**
	 * @return Doctrine\ORM\EntityManager
	 */
	protected function getEntityManager() { return $this->container->get('doctrine.orm.entity_manager'); }
	
	/**
	 * persist an instance of MenuItem with the entity_manager
	 * 
	 * @param MenuItem $item
	 */
	public function persist(MenuItem $item)
	{		
		$em = $this->getEntityManager();
		
		$identifier = $item->getIdentifier();
		$generated = (!$identifier);
		
		if($generated)				
			$identifier = $item->fixIdentifier();

		if(!$generated && ($found = $em->getRepository('GoGreat\CMSBaseBundle\Entity\MenuItem')->findOneByIdentifier($identifier)) && ($item != $found))
			return false;
		else if($generated)
			while($em->getRepository('GoGreat\CMSBaseBundle\Entity\MenuItem')->findOneByIdentifier($identifier))
				$identifier = $item->fixIdentifier(true);
				
		$item->setIdentifier($identifier);
		
		$em->persist($item);
		$em->flush();
	}
}