<?php
// src/Form/MyFormType.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MyFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number', NumberType::class)
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MyFormData::class,
        ]);
    }
}

// src/Form/MyFormData.php
namespace App\Form;

use Symfony\Component\Validator\Constraints as Assert;

class MyFormData
{
    /**
     * @Assert\NotBlank()
     * @Assert\Range(min = 0, max = 10)
     */
    public $number;
}