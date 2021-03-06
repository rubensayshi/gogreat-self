<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\DoctrineBundle\DoctrineBundle(),   
			new Symfony\Bundle\DoctrineFixturesBundle\DoctrineFixturesBundle(),
            
			new Symfony\Bundle\AsseticBundle\AsseticBundle(),            
      		new Knplabs\Bundle\MenuBundle\KnplabsMenuBundle(),
      		new Avalanche\Bundle\ImagineBundle\AvalancheImagineBundle(),
       		
       		new GoGreat\BaseBundle\BaseBundle(),
       		new GoGreat\ServerBaseBundle\ServerBaseBundle(),
       		new GoGreat\CMSBaseBundle\CMSBaseBundle(),
       		new GoGreat\UserBundle\UserBundle(),
       		new GoGreat\SiteManagerBundle\SiteManagerBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            //$bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
