<?php

namespace GoGreat\CMSBaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class NewsArticleType extends AbstractType
{
	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder->add('title', 'text');
		$builder->add('content', 'textarea');
		$builder->add('published_date', 'date');
	}

	public function getDefaultOptions(array $options)
	{
		return array(
            'data_class' => 'GoGreat\CMSBaseBundle\Entity\NewsArticle',
		);
	}
}