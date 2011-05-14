<?php

namespace GoGreat\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserType extends AbstractType
{
	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder->add('username');
		$builder->add('password', 'password');
		$builder->add('email');
		$builder->add('addresses', 'collection', array(
            'allow_add' 		=> true,
            'allow_delete' 		=> true,
            'prototype'  		=> true,
            'type' 				=> new AddressType(),
		));
	}

	public function getDefaultOptions(array $options)
	{
		return array(
            'data_class' => 'GoGreat\UserBundle\Entity\User',
		);
	}
}