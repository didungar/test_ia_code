<?php
// src/Form/YourFormType.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;

class YourFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fieldName', TextType::class, [
            'constraints' => [
                new Length(['min' => 5]),
                new Length(['max' => 10])
            ]
        ]);
    }
}