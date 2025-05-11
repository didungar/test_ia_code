<?php
// src/AppBundle/Service/CalculationLogic.php

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\Request;

class CalculationLogic
{
    /**
     * Calculate the result of a mathematical expression
     *
     * @param string $expression The mathematical expression to calculate
     *
     * @return float|int The result of the calculation
     */
    public function calculate($expression)
    {
        // Extract the operator and operands from the expression
        preg_match('/(\d+)\s*([+\-*/])\s*(\d+)/', $expression, $matches);
        
        if (!is_null($matches)) {
            $operator = $matches[2];
            $operand1 = intval($matches[1]);
            $operand2 = intval($matches[3]);
            
            switch ($operator) {
                case '+':
                    return $operand1 + $operand2;
                case '-':
                    return $operand1 - $operand2;
                case '*':
                    return $operand1 * $operand2;
                case '/':
                    if ($operand2 === 0) {
                        throw new \InvalidArgumentException('Division by zero is not allowed.');
                    }
                    
                    return $operand1 / $operand2;
                default:
                    throw new \InvalidArgumentException(sprintf('Invalid operator "%s"', $operator));
            }
        } else {
            throw new \InvalidArgumentException('The expression is not valid.');
        }
    }
}