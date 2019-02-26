<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Category;

class DatosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre', TextType::class, array(
                'label' => 'Nombre'))
            ->add('apellido1', TextType::class, array(
                'label' => 'Primer apellido'))
            ->add('apellido2', TextType::class, array(
                'label' => 'Segundo apellido',
                'required' => false))
            ->add('DNI', TextType::class, array(
                'label' => 'DNI'))
            ->add('fechaNacimiento', DateType::class, array(
                'label' => 'Date',
                'format' => 'dd-MM-yyyy',
                'years' => range(date('1950'), date('Y'))
                ))
            ->add('lugarNacimiento', TextType::class, array(
                'label' => 'Lugar de nacimiento'))
            ->add('sip', TextType::class, array(
                'label' => 'SIP'))
            ->add('direccion', TextType::class, array(
                'label' => 'Dirección'))
            ->add('cp', NumberType::class, array(
                'label' => 'Código Postal'))
            ->add('poblacion', TextType::class, array(
                'label' => 'Población'))
            ->add('email', EmailType::class, array(
                'label' => 'Email',
                'required' => false))
            ->add('telefono', NumberType::class, array(
                'label' => 'Teléfono',
                'required' => false))
            ->add('categoria', EntityType::class, array(
                'label' => 'Categoría',
                'class'=>Category::class,
                'required' => false
            ))
            ->add('equipo', ChoiceType::class, array(
                'label' => 'Equipo',
                'required' => false,
                'choices' => ['A' => 'A', 'B' => 'B', 'C' => 'C'],
            ))
            ->add('loteria', CheckboxType::class, array(
                'label' => 'Lotería',
                'required' => false))
            ->add('titular', TextType::class, array(
                'label' => 'Titular',
                'required' => false))
            ->add('dni_titular', TextType::class, array(
                'label' => 'DNI',
                'required' => false))
            ->add('direccion_titular', TextType::class, array(
                'label' => 'Dirección',
                'required' => false))
            ->add('cp_titular', NumberType::class, array(
                'label' => 'Código Postal',
                'required' => false))
            ->add('poblacion_titular', TextType::class, array(
                'label' => 'Población',
                'required' => false))
            ->add('iban', TextType::class, array(
                'label' => 'IBAN',
                'required' => false))
            ->add('jugador', CheckboxType::class, array(
                'label' => 'Jugador',
                'required' => false))
            ->add('entrenador', CheckboxType::class, array(
                'label' => 'Entrenador',
                'required' => false))
            ->add('tutor', CheckboxType::class, array(
                'label' => 'Tutor',
                'required' => false))
            ->add('documentos', FileType::class, array(
                'data_class' => null,
                'label' => 'Documentos',
                'required' => false))
            ->add('image', FileType::class, array(
                'data_class' => null,
                'label' => 'Foto de perfil',                
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '5M',
                        'mimeTypes' => [
                            "image/png", 
                            "image/jpeg",
                        ],
                        'mimeTypesMessage' => 'Seleccione una imagen válida',
                        ])
                ]
            ))
            ->add('confirmado', CheckboxType::class, array(
                'label' => 'Confirmación',
                'required' => false));

            
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

    private function getCategories()
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository(Category::class)->findAll();

        return $category;
    }
}
