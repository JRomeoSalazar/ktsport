<?php
namespace Sylius\Bundle\WebBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BarType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('title')
				->add('level', 'choice', array(
						'choices' => array(
							'1'	=> '1',
							'2'	=> '2',
							'3'	=> '3',
							'4'	=> '4',
							'5'	=> '5'
						)
					)
				);
				/*->add('author', 'text', array('required' => false))*/
	}
	public function getName()
	{
		return 'ktsport_bar';
	}
}