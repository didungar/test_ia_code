<?php
// src/Controller/ArithmeticController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArithmeticController extends AbstractController
{
    /**
     * @Route("/arithmetic", name="arithmetic")
     */
    public function index(): Response
    {
        $sum = 1 + 2; // Addition
        $difference = 5 - 3; // Soustraction
        $product = 4 * 6; // Multiplication
        $quotient = 12 / 3; // Division
        $remainder = 7 % 2; // Reste

        return $this->render('arithmetic/index.html.twig', [
            'sum' => $sum,
            'difference' => $difference,
            'product' => $product,
            'quotient' => $quotient,
            'remainder' => $remainder,
        ]);
    }
}