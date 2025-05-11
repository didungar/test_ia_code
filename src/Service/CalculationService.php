<?php
// src/Service/CalculationService.php
namespace App\Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CalculationService
{
    /**
     * @var array $calculator
     */
    private $calculator = [];

    public function __construct(array $calculator)
    {
        $this->calculator = $calculator;
    }

    /**
     * Calculate the sum of two numbers.
     *
     * @param int $a The first number.
     * @param int $b The second number.
     * @return int The result of the calculation.
     */
    public function calculateSum($a, $b)
    {
        return $this->calculator['sum']($a, $b);
    }

    /**
     * Calculate the difference between two numbers.
     *
     * @param int $a The first number.
     * @param int $b The second number.
     * @return int The result of the calculation.
     */
    public function calculateDifference($a, $b)
    {
        return $this->calculator['diff']($a, $b);
    }
}