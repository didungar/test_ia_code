<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SpecialCaseController extends AbstractController
{
    /**
     * @Route("/handle-special-case", name="handle_special_case")
     */
    public function handleSpecialCase(Request $request)
    {
        // Get the two numbers from the request
        $number1 = (int) $request->query->get('number1');
        $number2 = (int) $request->query->get('number2');

        // Handle the special case where one of the numbers is zero
        if ($number1 === 0 || $number2 === 0) {
            return $this->render('special_case/zero.html.twig', [
                'number1' => $number1,
                'number2' => $number2,
            ]);
        }

        // Calculate the sum of the two numbers
        $sum = $number1 + $number2;

        return $this->render('special_case/result.html.twig', [
            'sum' => $sum,
        ]);
    }
}