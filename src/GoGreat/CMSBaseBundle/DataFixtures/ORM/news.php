<?php

namespace GoGreat\CMSBaseBundle\DataFixtures\ORM;

use Symfony\Component\DependencyInjection\ContainerAware;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\ORM\EntityManager;
use	Doctrine\Common\DataFixtures\FixtureInterface;
use GoGreat\CMSBaseBundle\Entity;


class LoadCMSBaseNewsData extends ContainerAware implements FixtureInterface
{
	public function load($manager)
	{
		for($p = 0; $p < 10; $p++)
		{
			$news = new Entity\NewsArticle();
			$news->setTitle("lôrém news #{$p}");
			$news->setContent("lorem news ipsum #{$p}");

			$manager->persist($news);					
		}

		$manager->flush();
	}
}


$loader = new Loader();
$loader->addFixture(new LoadCMSBaseNewsData);