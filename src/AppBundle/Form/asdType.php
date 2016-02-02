<?php

namespace AppBundle\Form;


use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class asdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('aaa', TextType::class, ['error_bubbling' => true, 'attr' => ['class' => 'anyClass']])
            ->add('bbb', TextType::class, ['error_bubbling' => true])
            ->add('ccc', IntegerType::class, ['error_bubbling' => true])

        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'AppBundle\Entity\asd',
            ]
        );

    }

    public function getName()
    {
        return 'app_bundleasd_type';
    }
}
