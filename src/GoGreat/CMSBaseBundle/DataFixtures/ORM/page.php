<?php

namespace GoGreat\CMSBaseBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\Loader;
use Doctrine\ORM\EntityManager,
	Doctrine\Common\DataFixtures\FixtureInterface;
use GoGreat\CMSBaseBundle\Entity;


class LoadCMSBasePageData implements FixtureInterface
{
	public function load($manager)
	{
		for($p = 0; $p < 10; $p++)
		{
			$page = new Entity\Page();
			$page->setTitle("lorem tl #{$p}");
			$page->setContent("lorem tl ipsum #{$p}");

			$manager->persist($page);
		}

		$manager->flush();
	}
}


$loader = new Loader();
$loader->addFixture(new LoadCMSBasePageData);