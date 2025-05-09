<?php
// src/AppBundle/Controller/CalculatorController.php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\Calculator;

/**
 * @Route("/calculator")
 */
class CalculatorController extends Controller
{
    /**
     * @Route("/multiply", name="multiply")
     */
    public function multiplyAction(Request $request)
    {
        // Get the numbers from the request parameters
        $num1 = $request->query->get('num1');
        $num2 = $request->query->get('num2');

        // Check if both numbers are positive
        if ($num1 < 0 || $num2 < 0) {
            throw new \InvalidArgumentException('Only positive numbers are allowed.');
        }

        // Use the calculator service to multiply the numbers
        $calculator = $this->get('app.calculator');
        $result = $calculator->multiply($num1, $num2);

        return $this->render('AppBundle:Calculator:index.html.twig', [
            'result' => $result,
            'num1' => $num1,
            'num2' => $num2,
        ]);
    }
}