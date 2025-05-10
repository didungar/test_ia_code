<?php
// src/AppBundle/Controller/DivisionController.php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DivisionController extends Controller
{
    /**
     * @Route("/division/{dividend}/{divisor}", name="division")
     */
    public function divisionAction(Request $request, int $dividend, int $divisor): Response
    {
        // Dividir el dividendo entre el divisor
        $result = $dividend / $divisor;

        return $this->render('division/index.html.twig', [
            'dividend' => $dividend,
            'divisor' => $divisor,
            'result' => $result,
        ]);
    }
}