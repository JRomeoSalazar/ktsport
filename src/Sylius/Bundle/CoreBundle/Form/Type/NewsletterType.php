<?php
// src/Sylius/Bundle/CoreBundle/Form/Type/NewsletterUserType.php
namespace Sylius\Bundle\CoreBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Model\RepositoryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsletterType extends AbstractType
{
    /**
     * Newsletter user repository.
     *
     * @var RepositoryInterface
     */
    private $newsletterUserRepository;

    /**
     * Constructor.
     *
     * @param RepositoryInterface   $newsletterUserRepository
     */
    public function __construct(RepositoryInterface $newsletterUserRepository)
    {
        $this->newsletterUserRepository = $newsletterUserRepository;
    }

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

        $builder->add('emisor', 'email', array('label' => 'sylius.form.newsletter.emisor'))
                ->add('nombre_emisor', null, array(
                    'label' => 'sylius.form.newsletter.nombre_emisor',
                    'required' => false
                ))
                ->add('enviarATodos', null, array('label' => 'sylius.form.newsletter.enviarATodos'))
                ->add('provinces', 'entity', array(
                    'label' => 'sylius.form.newsletter.provinces',
                    'class' => 'Sylius\Bundle\AddressingBundle\Model\Province',
                    'expanded' => false,
                    'multiple' => true,
                    'attr' => array('class' => 'provinces')
                ))
                ->add('actividades', 'entity', array(
                    'label' => 'sylius.form.newsletter.actividades',
                    'class' => 'Sylius\Bundle\CoreBundle\Model\Actividad',
                    'expanded' => false,
                    'multiple' => true,
                    'attr' => array('class' => 'actividades')
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