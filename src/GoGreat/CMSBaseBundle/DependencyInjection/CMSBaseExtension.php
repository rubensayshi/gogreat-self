<?php

namespace GoGreat\CMSBaseBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Alias;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class CMSBaseExtension extends Extension
{
	/**
	 * @see Symfony\Component\DependencyInjection\Extension.ExtensionInterface::load()
	 */
	public function load(array $configs, ContainerBuilder $container)
	{
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
		
		$config = $this->mergeConfig($configs);

		if(!isset($config['upload_dir'])) {
            throw new \InvalidArgumentException('No upload_dir supplied');
		}

		foreach (array('upload_dir') as $key) {
			if (isset($config[$key])) {
				$container->setParameter('cms_base.'.$key, $config[$key]);
			}
		}
	}

	private function mergeConfig(array $configs)
	{
		$config = array();

		foreach ($configs as $cnf) {
			$config = array_merge($config, $cnf);
		}

		return $config;
	}

	/**
	 * @see Symfony\Component\DependencyInjection\Extension.ExtensionInterface::getAlias()
	 * @codeCoverageIgnore
	 */
	function getAlias()
	{
		return 'cms_base';
	}
}
