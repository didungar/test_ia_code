<?php
// src/Calculator/IntegerArithmeticOperationLogic.php
namespace Calculator;

class IntegerArithmeticOperationLogic
{
    public function add(int $a, int $b): int
    {
        return $a + $b;
    }

    public function subtract(int $a, int $b): int
    {
        return $a - $b;
    }

    public function multiply(int $a, int $b): int
    {
        return $a * $b;
    }

    public function divide(int $a, int $b): float
    {
        return (float) $a / $b;
    }
}