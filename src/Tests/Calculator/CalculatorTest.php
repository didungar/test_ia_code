<?php

namespace App\Tests\Calculator;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CalculatorTest extends TestCase
{
    public function testMultiplicationOfTwoPositiveNumbers()
    {
        $calculator = new Calculator();

        $request = Request::create('/multiply', 'POST', [
            'numbers' => [10, 20]
        ]);

        $response = $calculator->handle($request);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('{"result": 200}', $response->getContent());
    }
}