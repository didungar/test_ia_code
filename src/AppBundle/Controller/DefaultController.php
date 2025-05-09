<?php
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function handleZeroDivisionAction(Request $request)
    {
        // Get the number to divide by from the request
        $number = (int)$request->query->get('number');

        // Check if the number is not zero
        if ($number === 0) {
            return new Response('Cannot divide by zero', 400);
        }

        // Divide by the number and return the result
        $result = 12 / $number;

        return new Response($result, 200);
    }
}