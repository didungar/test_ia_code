<?php
// src/AppBundle/Service/ArithmeticalOperationsLogic.php
namespace AppBundle\Service;

use Symfony\Component\Validator\Constraints as Assert;

class ArithmeticalOperationsLogic
{
    /**
     * @Assert\NotBlank()
     */
    protected $a;

    /**
     * @Assert\NotBlank()
     */
    protected $b;

    /**
     * @Assert\Range(min="0", max="1")
     */
    protected $operation;

    public function __construct($a, $b, $operation)
    {
        $this->a = $a;
        $this->b = $b;
        $this->operation = $operation;
    }

    /**
     * @return float
     */
    public function getResult()
    {
        switch ($this->operation) {
            case '+':
                return $this->a + $this->b;
            case '-':
                return $this->a - $this->b;
            case '*':
                return $this->a * $this->b;
            case '/':
                if ($this->b == 0) {
                    throw new \Exception('Division by zero');
                }
                return $this->a / $this->b;
            default:
                throw new \InvalidArgumentException("Unsupported operation '$this->operation'");
        }
    }
}