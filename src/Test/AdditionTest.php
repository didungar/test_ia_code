<?php
// src/Test/AdditionTest.php

namespace Test;

use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    public function testAddTwoNumbers()
    {
        $result = 2 + 3;
        $this->assertEquals(5, $result);
    }
}