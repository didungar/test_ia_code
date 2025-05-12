<?php
// Validation.php
namespace App\Validation;

class MyValidator extends \Symfony\Component\Validator\ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$this->isValidFormat($value)) {
            $this->context->buildViolation('Invalid format.')
                ->atPath('myField')
                ->addViolation();
        }
    }

    private function isValidFormat(string $value): bool
    {
        // Implémenter une logique de validation personnalisée ici
        return true;
    }
}