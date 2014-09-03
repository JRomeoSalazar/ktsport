<?php
// src/Sylius/Bundle/CoreBundle/Form/Type/NewsletterUserType.php
namespace Sylius\Bundle\CoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsletterUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', 'email', array('label' => 'sylius.form.newsletter_user.email'))
                ->add('name', null, array(
                    'label' => 'sylius.form.newsletter_user.name',
                    'required' => false,
                ))
                ->add('province', 'entity', array(
                    'label' => 'sylius.form.newsletter_user.province',
                    'class' => 'Sylius\Bundle\AddressingBundle\Model\Province',
                    'expanded' => false,
                    'multiple' => false
                ));
    }
    
    public function getName()
    {
        return 'sylius_newsletter_user';
    }
}