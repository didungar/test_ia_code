<?php
// src/AppBundle/Controller/CalculatorController.php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CalculatorController extends Controller
{
    /**
     * @Route("/subtract")
     */
    public function subtractAction(Request $request)
    {
        // Get the input values from the request
        $num1 = $request->query->get('num1');
        $num2 = $request->query->get('num2');

        // Perform the subtraction operation
        $result = $num1 - $num2;

        // Return the result as a JSON response
        return new Response(json_encode([
            'result' => $result,
        ]));
    }
}