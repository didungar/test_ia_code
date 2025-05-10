<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SpecialCaseHandlerController extends Controller
{
    /**
     * @Route("/special-case", name="special_case")
     */
    public function specialCase(Request $request)
    {
        // Get the number from the request
        $number = $request->query->get('number');

        // Check if the number is zero
        if ($number === 0) {
            // Handle the special case
            $result = 'The number is zero!';
        } else {
            // Do something with the other numbers
            $result = 'The number is not zero.';
        }

        return $this->render('special_case/index.html.twig', [
            'number' => $number,
            'result' => $result
        ]);
    }
}