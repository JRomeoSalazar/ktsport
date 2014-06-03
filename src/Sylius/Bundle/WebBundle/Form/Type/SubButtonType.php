<?php

namespace Sylius\Bundle\WebBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SubButtonType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('title')
				->add('content', 'textarea', array(
			        'attr' => array(
			            'class' => 'tinymce'
			        )
			    ))
				->add('url')
				->add('image')
				->add('pdf')
				->add('button');
	}
	public function getName()
	{
		return 'ktsport_subbutton';
	}
}