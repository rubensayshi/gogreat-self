<?php

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
	'Symfony'		  					=> array(__DIR__.'/../vendor/symfony/src', __DIR__.'/../vendor/bundles'),    
	'Sensio' 							=> __DIR__.'/../vendor/bundles',
	'Doctrine\\Common\\DataFixtures' 	=> __DIR__.'/../vendor/doctrine-fixtures/lib',
	'Doctrine\\Common' 					=> __DIR__.'/../vendor/doctrine-common/lib',  
	'Doctrine\\DBAL'   					=> __DIR__.'/../vendor/doctrine-dbal/lib',
	'Doctrine'		 					=> __DIR__.'/../vendor/doctrine/lib',
	'Monolog'							=> __DIR__.'/../vendor/monolog/src',
	'Assetic'		  					=> __DIR__.'/../vendor/assetic/src',
	'Metadata'							=> __DIR__.'/../vendor/metadata/src',
	'Knplabs'							=> __DIR__.'/../vendor/bundles',
	'GoGreat\\SymfonyWrapper'			=> __DIR__.'/../vendor/gogreat/src', 
	'GoGreat'		  					=> array(__DIR__.'/../src', __DIR__.'/../vendor/bundles'),	
	'Imagine'							=> __DIR__.'/../vendor/imagine/lib',
	'Avalanche' 	   					=> __DIR__.'/../vendor/bundles',
));
$loader->registerPrefixes(array(
	'Twig_Extensions_' => __DIR__.'/../vendor/twig-extensions/lib',
	'Twig_'			=> __DIR__.'/../vendor/twig/lib',
));
$loader->registerPrefixFallbacks(array(
	__DIR__.'/../vendor/symfony/src/Symfony/Component/Locale/Resources/stubs',
));
$loader->registerNamespaceFallbacks(array(
	__DIR__.'/../src',
));
$loader->register();

// Swiftmailer needs a special autoloader to allow
// the lazy loading of the init file (which is expensive)
require_once __DIR__.'/../vendor/swiftmailer/lib/classes/Swift.php';
Swift::registerAutoload(__DIR__.'/../vendor/swiftmailer/lib/swift_init.php');
