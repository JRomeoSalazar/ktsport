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

class NewsletterUserFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'required' => false,
                'label'    => 'sylius.form.newsletter_user.name',
                'attr'     => array(
                    'placeholder' => 'sylius.form.newsletter_user.name'
                )
            ))
            ->add('email', 'text', array(
                'required' => false,
                'label'    => 'sylius.form.newsletter_user.email',
                'attr'     => array(
                    'placeholder' => 'sylius.form.newsletter_user.email'
                )
            ))
        ;
    }

    public function getName()
    {
        return 'sylius_newsletter_user_filter';
    }
}
