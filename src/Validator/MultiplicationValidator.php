<?php
// src/Validator/MultiplicationValidator.php
namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

/**
 * @Annotation
 */
class Multiplication extends Constraint
{
    public $message = 'Invalid value for multiplication';
    public $multiplicand;
    public $multiplier;

    /**
     * {@inheritdoc}
     */
    public function validatedBy()
    {
        return MultiplicationValidator::class;
    }
}