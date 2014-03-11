<?php
// src/Sylius/Bundle/CoreBundle/Form/Type/DescuentoType.php
namespace Sylius\Bundle\CoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DescuentoType extends AbstractType
{
    protected $dataClass;

    public function __construct($dataClass)
    {
        $this->dataClass = $dataClass;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('group', 'entity', array(
                    'label' => 'sylius.form.descuento.grupo',
                    'class' => 'Sylius\Bundle\CoreBundle\Model\Group',
                    'property' => 'name',
                ))
                ->add('porcentaje', null, array('label' => 'sylius.form.descuento.porcentaje'));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setDefaults(array(
                'data_class' => $this->dataClass
            ))
        ;
    }

    public function getName()
    {
        return 'sylius_descuento';
    }
}