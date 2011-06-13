<?php

namespace GoGreat\CMSBaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PageType extends AbstractType
{
	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder->add('title', 'text');
		$builder->add('content', 'textarea');
	}

	public function getDefaultOptions(array $options)
	{
		return array(
            'data_class' => 'GoGreat\CMSBaseBundle\Entity\Page',
		);
	}
}