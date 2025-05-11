<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AdditionController extends AbstractController
{
    /**
     * @Route("/addition", name="addition")
     */
    public function index(Request $request)
    {
        // Get the numbers from the request
        $number1 = $request->query->get('number1');
        $number2 = $request->query->get('number2');

        // Add the numbers together and return the result
        $result = $number1 + $number2;

        return $this->render('addition/index.html.twig', [
            'result' => $result,
        ]);
    }
}