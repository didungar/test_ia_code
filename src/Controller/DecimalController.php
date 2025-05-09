<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DecimalController extends AbstractController
{
    /**
     * @Route("/decimal", name="decimal")
     */
    public function index(): Response
    {
        // Calculate the decimal number
        $decimal = 3.14;

        return $this->render('decimal/index.html.twig', [
            'decimal' => $decimal,
        ]);
    }
}