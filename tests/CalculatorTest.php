<?php
// tests/CalculatorTest.php

namespace App\Tests;

use App\Service\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testAdd()
    {
        $calculator = new Calculator();

        // Test with two positive numbers
        $this->assertEquals(5, $calculator->add(2, 3));

        // Test with two negative numbers
        $this->assertEquals(-1, $calculator->add(-2, -3));

        // Test with a positive and a negative number
        $this->assertEquals(1, $calculator->add(2, -3));
    }
}