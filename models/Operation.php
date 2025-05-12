<?php
// models/Operation.php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Operation
{
    /**
     * @var int $left
     * @Assert\Type(type="integer")
     */
    private $left;

    /**
     * @var int $right
     * @Assert\Type(type="integer")
     */
    private $right;

    /**
     * @var string $operator
     * @Assert\Choice(choices={"add", "subtract", "multiply", "divide"})
     */
    private $operator;

    public function getLeft(): int
    {
        return $this->left;
    }

    public function setLeft(int $left): void
    {
        $this->left = $left;
    }

    public function getRight(): int
    {
        return $this->right;
    }

    public function setRight(int $right): void
    {
        $this->right = $right;
    }

    public function getOperator(): string
    {
        return $this->operator;
    }

    public function setOperator(string $operator): void
    {
        $this->operator = $operator;
    }

    /**
     * Returns the result of the operation.
     *
     * @return int The result of the operation
     */
    public function calculate(): int
    {
        switch ($this->operator) {
            case 'add':
                return $this->left + $this->right;
            case 'subtract':
                return $this->left - $this->right;
            case 'multiply':
                return $this->left * $this->right;
            case 'divide':
                if ($this->right == 0) {
                    throw new \LogicException('Cannot divide by zero');
                }
                return $this->left / $this->right;
        }
    }
}