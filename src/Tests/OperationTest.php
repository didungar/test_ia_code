<?php
// tests/OperationTest.php
namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Util\MathOperations;

class OperationTest extends WebTestCase
{
    public function testAddition()
    {
        $mathOperations = new MathOperations();
        $result = $mathOperations->add(2, 3);
        self::assertEquals(5, $result);
    }

    public function testSubtraction()
    {
        $mathOperations = new MathOperations();
        $result = $mathOperations->subtract(4, 2);
        self::assertEquals(2, $result);
    }

    // ...
}