<?php
// src/Controller/MyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyController extends AbstractController
{
    /**
     * @Route("/", name="my_route")
     */
    public function myAction(Request $request): Response
    {
        // Get the first and second digits from the request data
        $firstDigit = (int) $request->query->get('firstDigit');
        $secondDigit = (int) $request->query->get('secondDigit');

        // Check if the second digit is equal to 0
        if ($secondDigit === 0) {
            return $this->render('error.html.twig', [
                'message' => 'The second digit cannot be equal to 0.'
            ]);
        }

        // Proceed with the rest of the logic...
    }
}