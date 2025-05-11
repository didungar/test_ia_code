<?php
// src/Controller/ArithmeticOperationsController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArithmeticOperationsController extends AbstractController
{
    /**
     * @Route("/arithmetic-operations", name="arithmetic_operations")
     */
    public function index()
    {
        $numbers = [1, 2, 3, 4, 5];
        $result = [];

        foreach ($numbers as $number) {
            $result[] = $this->addTwoNumbers($number);
        }

        return $this->render('arithmetic_operations/index.html.twig', [
            'numbers' => $numbers,
            'result'  => $result
        ]);
    }

    private function addTwoNumbers(int $number): int
    {
        return $number + 2;
    }
}