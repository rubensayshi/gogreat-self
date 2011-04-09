<?php

namespace GoGreat\CMSBaseBundle\DataFixtures\ORM;

use Symfony\Component\DependencyInjection\ContainerAware;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use GoGreat\CMSBaseBundle\Entity;

class LoadCMSBaseMenuItemData extends ContainerAware implements FixtureInterface
{
	protected $menuItemData = array(
		array(
			'title'			=> 'Homepage',
			'identifier'	=> 'homepage',
			'routing'		=> 'homepage',
			'arguments'		=> array(),
			'weight'		=> -3,
		),
		array(
			'title'			=> 'Hello Ben',
			'identifier'	=> 'hello_ruben',
			'routing'		=> 'hello',
			'arguments'		=> array('name'	=> 'Ruben'),
			'weight'		=> -2,
		),
		array(
			'title'			=> 'Hello Tjoppie',
			'identifier'	=> 'hello_tjopper',
			'routing'		=> 'hello',
			'arguments'		=> array('name'	=> 'Tjopper'),
			'weight'		=> -1,
		),
	);
	
	public function load($manager)
	{		
		
		foreach($this->menuItemData as $data)
		{		
			$item = new Entity\MenuItem();
			$item->setTitle($data['title']);
			$item->setRouting($data['routing']);
			$item->setIdentifier($data['identifier']);
			$item->setArguments($data['arguments']);
			if(isset($data['weight']))
				$item->setWeight($data['weight']);

			$manager->getRepository('GoGreat\CMSBaseBundle\Entity\MenuItem')->persist($item);
		}

		$manager->flush();
	}
}


$loader = new Loader();
$loader->addFixture(new LoadCMSBaseMenuItemData);