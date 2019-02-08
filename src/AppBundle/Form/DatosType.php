<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DatosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre')
            ->add('apellido1')
            ->add('apellido2')
            ->add('fechaNacimiento')
            ->add('lugarNacimiento')
            ->add('dni')
            ->add('sip')
            ->add('direccion')
            ->add('cp')
            ->add('poblacion')
            ->add('id_tutor')
            ->add('email')
            ->add('telefono')
            ->add('categoria')
            ->add('club')
            ->add('equipo')
            ->add('loteria')
            ->add('titular')
            ->add('dni_titular')
            ->add('direccion_titular')
            ->add('cp_titular')
            ->add('poblacion_titular')
            ->add('iban')
            ->add('jugador')
            ->add('entrenador')
            ->add('tutor')
            ->add('documentos')
            ->add('confirmado');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Datos'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_datos';
    }


}
