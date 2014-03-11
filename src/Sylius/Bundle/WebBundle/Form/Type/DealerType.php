<?php

namespace Sylius\Bundle\WebBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class DealerType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('title')
				->add('zone')
				->add('phone')
				->add('url')
				->add('mail');
	}
	public function getName()
	{
		return 'ktsport_dealer';
	}
}