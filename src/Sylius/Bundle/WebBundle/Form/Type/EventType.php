<?php

namespace Sylius\Bundle\WebBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EventType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('date')
				->add('title')
				->add('city');
	}
	public function getName()
	{
		return 'ktsport_event';
	}
}