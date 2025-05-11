<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;

class SecondNumberController extends AbstractController
{
    /**
     * @Route("/second-number", name="second_number")
     */
    public function index(Request $request): Response
    {
        // Get the second number from the request
        $secondNumber = $request->query->get('second_number');

        // Validate the second number using the Symfony validator component
        $validation = $this->createForm(SecondNumberType::class, ['second_number' => $secondNumber])
            ->validate($request->query);

        if ($validation->isValid()) {
            // If the second number is valid, render the template with the correct data
            return $this->render('second_number/index.html.twig', [
                'second_number' => $secondNumber,
                'message' => 'Second number is valid!',
            ]);
        } else {
            // If the second number is invalid, render the template with an error message
            return $this->render('second_number/index.html.twig', [
                'second_number' => null,
                'message' => 'Invalid second number!',
            ]);
        }
    }
}