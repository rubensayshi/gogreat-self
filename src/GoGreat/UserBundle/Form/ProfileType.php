<?php

namespace GoGreat\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ProfileType extends AbstractType
{
	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder->add('username');
		$builder->add('password', 'password');
		$builder->add('email');
	}

	public function getDefaultOptions(array $options)
	{
		return array(
            'data_class' => 'GoGreat\UserBundle\Entity\User',
		);
	}
}