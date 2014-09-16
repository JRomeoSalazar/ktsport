<?php
// src/Sylius/Bundle/CoreBundle/Form/Type/NewsletterUserType.php
namespace Sylius\Bundle\CoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActividadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', null, array(
                    'label' => 'sylius.form.actividad.name',
                    'required' => false,
                ));
    }
    
    public function getName()
    {
        return 'sylius_actividad';
    }
}