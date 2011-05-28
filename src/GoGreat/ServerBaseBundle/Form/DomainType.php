<?php

namespace GoGreat\ServerBaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class DomainType extends AbstractType
{
	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder->add('domain', 'text');
	}

	public function getDefaultOptions(array $options)
	{
		return array(
            'data_class' => 'GoGreat\ServerBaseBundle\Entity\Domain',
		);
	}
}