<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;

class FractionArithmeticService
{
    /**
     * @Assert\NotBlank()
     */
    private $numerator;

    /**
     * @Assert\NotBlank()
     */
    private $denominator;

    public function __construct(int $numerator, int $denominator)
    {
        $this->numerator = $numerator;
        $this->denominator = $denominator;
    }

    /**
     * Add two fractions together
     *
     * @param FractionArithmeticService $fraction
     * @return FractionArithmeticService
     */
    public function add(FractionArithmeticService $fraction): FractionArithmeticService
    {
        $resultNumerator = ($this->numerator * $fraction->denominator) + ($this->denominator * $fraction->numerator);
        $resultDenominator = $this->denominator * $fraction->denominator;

        return new self($resultNumerator, $resultDenominator);
    }

    /**
     * Subtract two fractions from each other
     *
     * @param FractionArithmeticService $fraction
     * @return FractionArithmeticService
     */
    public function subtract(FractionArithmeticService $fraction): FractionArithmeticService
    {
        $resultNumerator = ($this->numerator * $fraction->denominator) - ($this->denominator * $fraction->numerator);
        $resultDenominator = $this->denominator * $fraction->denominator;

        return new self($resultNumerator, $resultDenominator);
    }

    /**
     * Multiply two fractions together
     *
     * @param FractionArithmeticService $fraction
     * @return FractionArithmeticService
     */
    public function multiply(FractionArithmeticService $fraction): FractionArithmeticService
    {
        $resultNumerator = $this->numerator * $fraction->numerator;
        $resultDenominator = $this->denominator * $fraction->denominator;

        return new self($resultNumerator, $resultDenominator);
    }

    /**
     * Divide two fractions
     *
     * @param FractionArithmeticService $fraction
     * @return FractionArithmeticService
     */
    public function divide(FractionArithmeticService $fraction): FractionArithmeticService
    {
        $resultNumerator = $this->numerator * $fraction->denominator;
        $resultDenominator = $this->denominator * $fraction->numerator;

        return new self($resultNumerator, $resultDenominator);
    }
}