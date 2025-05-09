<?php
// src/Model/Calculator.php
namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class Calculator
{
    /**
     * @Assert\NotBlank()
     */
    protected $number1;

    /**
     * @Assert\NotBlank()
     */
    protected $number2;

    /**
     * @Assert\Choice(choices={"sum", "subtract", "multiply", "divide"}, message="Invalid operation")
     */
    protected $operation;

    public function __construct($number1, $number2, $operation)
    {
        $this->number1 = $number1;
        $this->number2 = $number2;
        $this->operation = $operation;
    }

    /**
     * @return int
     */
    public function getNumber1()
    {
        return $this->number1;
    }

    /**
     * @param int $number1
     */
    public function setNumber1($number1)
    {
        $this->number1 = $number1;
    }

    /**
     * @return int
     */
    public function getNumber2()
    {
        return $this->number2;
    }

    /**
     * @param int $number2
     */
    public function setNumber2($number2)
    {
        $this->number2 = $number2;
    }

    /**
     * @return string
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * @param string $operation
     */
    public function setOperation($operation)
    {
        $this->operation = $operation;
    }

    /**
     * Calculate the result of the operation
     *
     * @return int
     */
    public function calculate()
    {
        switch ($this->operation) {
            case 'sum':
                return $this->number1 + $this->number2;
            case 'subtract':
                return $this->number1 - $this->number2;
            case 'multiply':
                return $this->number1 * $this->number2;
            case 'divide':
                if ($this->number2 === 0) {
                    throw new \InvalidArgumentException('Division by zero is not allowed');
                }
                return $this->number1 / $this->number2;
            default:
                throw new \LogicException('Unknown operation');
        }
    }
}