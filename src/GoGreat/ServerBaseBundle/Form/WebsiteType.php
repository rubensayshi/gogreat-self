<?php

namespace GoGreat\ServerBaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class WebsiteType extends AbstractType
{
	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder->add('name', 'text');
		$builder->add('domains', 'collection', array(
			'type'			=> new DomainType(),
			'allow_add'		=> true,
			'allow_delete'	=> true,
			'prototype'		=> true,
		));
		
		$builder->add('modules', 'entity', array(
			'class'			=> 'GoGreat\ServerBaseBundle\Entity\Module',
			'expanded'		=> true,
			'multiple'		=> true,
		));
	}

	public function getDefaultOptions(array $options)
	{
		return array(
            'data_class' => 'GoGreat\ServerBaseBundle\Entity\Website',
		);
	}
}