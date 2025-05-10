<?php
// src/Validator/Constraints/NumericFormatValidator.php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidatorInterface;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class NumericFormatValidator implements ConstraintValidatorInterface
{
    public function validate($value, Constraint $constraint)
    {
        // Check if the value is a numeric string
        if (!is_numeric($value)) {
            throw new UnexpectedValueException('The value must be a numeric string.');
        }

        // Get the allowed decimal digits count from the constraint
        $decimalDigitsCount = $constraint->getDecimalDigits();

        // Check if the value has the correct number of decimal digits
        if (strpos($value, '.') !== false) {
            $decimalPlaces = strlen(substr(strrchr($value, "."), 1));
            if ($decimalPlaces > $decimalDigitsCount) {
                throw new UnexpectedValueException('The value must have no more than ' . $decimalDigitsCount . ' decimal digits.');
            }
        } elseif ($decimalDigitsCount !== 0) {
            throw new UnexpectedValueException('The value must have no more than ' . $decimalDigitsCount . ' decimal digits.');
        }
    }
}