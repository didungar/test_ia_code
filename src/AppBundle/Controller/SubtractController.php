<?php
// src/Controller/SubtractController.php

namespace Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SubtractController extends Controller
{
    /**
     * @Route("/subtract/{num1}/{num2}", name="subtract")
     */
    public function subtractAction(Request $request, $num1, $num2)
    {
        // Validate input numbers
        if (!is_numeric($num1) || !is_numeric($num2)) {
            throw new \InvalidArgumentException('Input must be numeric');
        }

        // Subtract the two numbers
        $result = (int)$num1 - (int)$num2;

        // Return the result as a response
        return new Response($result);
    }
}