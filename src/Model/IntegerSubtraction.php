<?php
// src/Model/IntegerSubtraction.php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class IntegerSubtraction
{
    /**
     * @var int
     *
     * @Assert\Type(type="integer")
     */
    private $minuend;

    /**
     * @var int
     *
     * @Assert\Type(type="integer")
     */
    private $subtrahend;

    /**
     * @var int
     *
     * @Assert\Type(type="integer")
     */
    private $result;

    public function __construct(int $minuend, int $subtrahend)
    {
        $this->minuend = $minuend;
        $this->subtrahend = $subtrahend;
        $this->result = $minuend - $subtrahend;
    }

    public function getMinuend(): int
    {
        return $this->minuend;
    }

    public function getSubtrahend(): int
    {
        return $this->subtrahend;
    }

    public function getResult(): int
    {
        return $this->result;
    }
}