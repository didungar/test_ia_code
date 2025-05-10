<?php
// src/Validator/Constraints/MyConstraint.php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class MyConstraint extends Constraint
{
    public $message = 'This value is not valid';

    public function validatedBy()
    {
        return 'my_constraint';
    }
}