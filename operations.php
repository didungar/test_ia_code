<?php
// operations.php

namespace App\Operations;

use Symfony\Component\Validator\Constraints as Assert;

class Multiplication implements OperationInterface
{
    /**
     * @Assert\GreaterThan(0)
     */
    private $operand1;

    /**
     * @Assert\GreaterThan(0)
     */
    private $operand2;

    public function __construct($operand1, $operand2)
    {
        $this->operand1 = $operand1;
        $this->operand2 = $operand2;
    }

    public function getResult(): float
    {
        return $this->operand1 * $this->operand2;
    }
}