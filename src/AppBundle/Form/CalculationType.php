<?php
// src/AppBundle/Form/CalculationType.php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalculationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('multiplicand', 'number', [
            'label' => 'Multiplicand'
        ])
            ->add('multiplier', 'number', [
                'label' => 'Multiplier'
            ])
            ->add('result', 'number', [
                'label' => 'Result'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Calculation::class,
        ]);
    }
}