<?php
// TestDisplayNumberFunction.php
namespace App\Tests\Calculator;

use PHPUnit\Framework\TestCase;

class TestDisplayNumberFunction extends TestCase
{
    public function testDisplayNumber()
    {
        $number = 1234567890;
        $result = displayNumber($number);

        $this->assertEquals('123,456,789', $result);
    }
}