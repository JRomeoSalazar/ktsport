<?php
// src/Sylius/Bundle/CoreBundle/Form/Type/NewsletterUserType.php
namespace Sylius\Bundle\CoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsletterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $mes = array(
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre'
        );

        $destinatarios = array(
            'roberto@email.com' => 'roberto@email.com',
            'jorge@email.com' => 'jorge@email.com',
            'andres@email.com' => 'andres@email.com'
        );

        $builder->add('emisor', 'email', array('label' => 'sylius.form.newsletter.emisor'))
                ->add('destinatarios', 'choice', array(
                    'label' => 'sylius.form.newsletter.destinatarios',
                    'choices' => $destinatarios,
                    'expanded' => false,
                    'multiple' => true
                ))
                ->add('mes', 'choice', array(
                    'label' => 'sylius.form.newsletter.mes',
                    'choices' => $mes,
                    'expanded' => false,
                    'multiple' => false
                ))
                ->add('titulo', null, array('label' => 'sylius.form.newsletter.titulo'))
                ->add('contenido', 'textarea', array(
                    'label' => 'sylius.form.newsletter.contenido',
                    'attr' => array('class' => 'tinymce')
                ));
    }
    
    public function getName()
    {
        return 'sylius_newsletter';
    }
}