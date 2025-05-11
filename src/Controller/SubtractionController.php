<?php
// src/Controller/SubtractionController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SubtractionController extends AbstractController
{
    /**
     * @Route("/subtraction", name="subtraction")
     */
    public function subtraction(Request $request)
    {
        // On récupère les paramètres de la requête
        $numbers = $request->get('numbers');

        // On vérifie si les paramètres sont valides
        if (!$this->isValidNumbers($numbers)) {
            return new Response('Invalid numbers', 400);
        }

        // On soustrait les nombres consécutifs
        $result = $this->subtractConsecutiveNumbers($numbers);

        // On renvoie la réponse au client
        return new Response(json_encode(['result' => $result]));
    }

    /**
     * Vérifie si les nombres sont valides
     */
    private function isValidNumbers($numbers)
    {
        // On vérifie si tous les nombres sont positifs
        foreach ($numbers as $number) {
            if ($number <= 0) {
                return false;
            }
        }

        // Si tous les nombres sont positifs, on renvoie true
        return true;
    }

    /**
     * Soustrait les nombres consécutifs
     */
    private function subtractConsecutiveNumbers($numbers)
    {
        $result = 0;

        // On itère sur les nombres pour soustraire les nombres consécutifs
        foreach ($numbers as $i => $number) {
            if (isset($numbers[$i + 1])) {
                $result -= abs($number - $numbers[$i + 1]);
            }
        }

        return $result;
    }
}