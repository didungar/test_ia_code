<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MultiplicationLogicController extends AbstractController
{
    /**
     * @Route("/multiplication/decimals", name="multiplication_decimals")
     */
    public function multiplicationDecimals(): Response
    {
        $x = 2.5; // nombre à multiplier
        $y = 3.1; // nombre à multiplier

        $result = $x * $y; // résultat de la multiplication

        return new Response('Le résultat de la multiplication de ' . $x . ' et ' . $y . ' est : ' . $result);
    }
}