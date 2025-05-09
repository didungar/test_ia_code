<?php
// src/Controller/MyController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyController extends AbstractController
{
    /**
     * @Route("/large-numbers", name="large_numbers")
     */
    public function largeNumbers(): Response
    {
        $number = '12345678901234567890'; // Very large number
        $result = bcadd($number, 1); // Add 1 to the number using BCMath
        return new Response(json_encode(['result' => $result]));
    }
}