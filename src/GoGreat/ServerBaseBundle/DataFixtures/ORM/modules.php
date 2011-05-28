<?php

namespace GoGreat\ServerBaseBundle\DataFixtures\ORM;

use Symfony\Component\DependencyInjection\ContainerAware;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use GoGreat\ServerBaseBundle\Entity\Module;

class LoadModuleData extends ContainerAware implements FixtureInterface
{	
	public function load($manager)
	{	
		for($i = 0; $i < 10; $i++) {
			$module = new Module();
			$module->setName('Lorem Ipsum #'.$i);
			
			$manager->persist($module);
		}

		$manager->flush();
	}
}


$loader = new Loader();
$loader->addFixture(new LoadModuleData);