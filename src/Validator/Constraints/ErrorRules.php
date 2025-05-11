<?php
// src/Validator/Constraints/ErrorRules.php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @Annotation
 */
class ErrorRules extends Constraint
{
    public $message = 'This value is not valid';
    public $maxLength = 100;
    public $minLength = 5;

    /**
     * {@inheritdoc}
     */
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }

    /**
     * {@inheritdoc}
     */
    public function validatedBy()
    {
        return ErrorRulesValidator::class;
    }
}