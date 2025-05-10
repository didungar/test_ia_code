<?php
// src/Controller/CalculatorController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    /**
     * @Route("/add", name="add")
     */
    public function add(Request $request)
    {
        $a = (int) $request->query->get('a');
        $b = (int) $request->query->get('b');

        return $this->render('calculator/index.html.twig', [
            'result' => $a + $b,
        ]);
    }
}