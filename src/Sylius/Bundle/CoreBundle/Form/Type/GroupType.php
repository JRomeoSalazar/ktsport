<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\CoreBundle\Form\Type;

use Sylius\Bundle\CoreBundle\Services\Roles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * User group form type.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class GroupType extends AbstractType
{
    private $dataClass;

    /**
     * @var Roles
     */
    private $roles;

    public function __construct($dataClass, Roles $roles)
    {
        $this->dataClass = $dataClass;
        $this->roles = $roles;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'label' => 'sylius.form.group.name'
            ))
            ->add('roles', 'choice', array(
                'label' => 'sylius.form.group.roles',
                'choices' => $this->roles->getRoles(),
                'expanded' => false,
                'multiple' => true,
                'required' => true,
            ))
        ;

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setDefaults(array(
                'data_class'        => $this->dataClass,
                'validation_groups' => array('sylius')
            )
        );
    }

    public function getName()
    {
        return 'sylius_group';
    }
}
