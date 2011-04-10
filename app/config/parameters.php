<?php

use GoGreat\SymfonyWrapper\SymfonyCnf;

if($database = SymfonyCnf::getSection('database'))
	foreach($database as $key => $val)
		if($key = preg_replace('/^symfony\.db/', 'database', $key))
			$container->setParameter($key,		trim($val));
			
$container->setParameter('mailer_transport', 	'smtp');
$container->setParameter('mailer_host', 		'localhost');
$container->setParameter('mailer_user', 		'');
$container->setParameter('mailer_password', 	'');

$container->setParameter('locale', 				'en');

$container->setParameter('csrf_secret', 		'xyxyxyxyxyxy');

