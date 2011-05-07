<?php

namespace GoGreat\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AddressType extends AbstractType
{
	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder->add('street');
		$builder->add('zipcode');
		$builder->add('city');
		$builder->add('country');
	}

	public function getDefaultOptions(array $options)
	{
		return array(
            'data_class' => 'GoGreat\UserBundle\Entity\Address',
		);
	}
}