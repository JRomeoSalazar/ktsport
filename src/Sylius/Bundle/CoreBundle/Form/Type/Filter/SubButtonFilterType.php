<?php

/*
* This file is part of the Sylius package.
*
* (c) Paweł Jędrzejewski
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Sylius\Bundle\CoreBundle\Form\Type\Filter;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * SubButtons filter form type.
 *
 * @author Jorge Romeo <jromeosalazar@gmail.com>
 */
class SubButtonFilterType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array(
                'required' => false,
                'label'    => 'sylius.form.subbutton_filter.title',
                'attr'     => array(
                    'placeholder' => 'sylius.form.subbutton_filter.title'
                )
            ))
            ->add('content', 'text', array(
                'required' => false,
                'label'    => 'sylius.form.subbutton_filter.content',
                'attr'     => array(
                    'placeholder' => 'sylius.form.subbutton_filter.content'
                )
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setDefaults(array(
                'data_class' => null
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'sylius_subbutton_filter';
    }
}
