<?php
// src/AppBundle/Controller/YourController.php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\NotBlank;

class YourController extends Controller
{
    public function yourAction(Request $request)
    {
        // Get the input value from the request object
        $inputValue = $request->query->get('input_value');

        // Create a new constraint object for checking if the input value is numeric
        $constraint = new NotBlank();

        // Validate the input value using the constraint object
        $violations = $this->get('validator')->validate($inputValue, $constraint);

        // If the input value is not numeric, add an error message to the response
        if (count($violations) > 0) {
            $response = new Response();
            $response->setContent('Invalid input value. Please enter a numeric value.');
            return $response;
        } else {
            // If the input value is numeric, continue with the rest of the logic
            // ...
        }
    }
}