<?php

namespace GoGreat\CMSBaseBundle\DataFixtures\ORM;

use Symfony\Component\DependencyInjection\ContainerAware;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\ORM\EntityManager;
use	Doctrine\Common\DataFixtures\FixtureInterface;
use GoGreat\CMSBaseBundle\Entity;


class LoadCMSBaseBlockData extends ContainerAware implements FixtureInterface
{
	public function load($manager)
	{

	}
}


$loader = new Loader();
$loader->addFixture(new LoadCMSBaseBlockData);