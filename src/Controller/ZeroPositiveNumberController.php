<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

/**
 * @Route("/zero-positive-number")
 */
class ZeroPositiveNumberController extends AbstractController
{
    /**
     * @Route("/", name="zero_positive_number")
     */
    public function index(Request $request)
    {
        // Get the number from the request
        $number = $request->query->get('number');

        // Check if the number is zero or positive
        if ($number > 0) {
            return $this->render('index.html.twig', [
                'message' => 'The number is positive!',
            ]);
        } elseif ($number === 0) {
            return $this->render('index.html.twig', [
                'message' => 'The number is zero!',
            ]);
        } else {
            return $this->render('index.html.twig', [
                'message' => 'The number is negative!',
            ]);
        }
    }
}