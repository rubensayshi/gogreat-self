<?php

$container->setParameter('database_driver', 	'pdo_mysql');
$container->setParameter('database_host',		'localhost');
$container->setParameter('database_name', 		'symfony');
$container->setParameter('database_user', 		'root');
$container->setParameter('database_password', 	'root');
$container->setParameter('mailer_transport', 	'smtp');
$container->setParameter('mailer_host', 		'localhost');
$container->setParameter('mailer_user', 		'');
$container->setParameter('mailer_password', 	'');
$container->setParameter('locale', 				'en');
$container->setParameter('csrf_secret', 		'xyxyxyxyxyxy');

