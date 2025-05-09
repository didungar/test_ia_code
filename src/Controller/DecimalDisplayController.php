<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DecimalDisplayController extends AbstractController
{
    public function index(Request $request)
    {
        // Récupérer la valeur à afficher
        $value = $request->get('value');

        // Convertir la valeur en string pour l'affichage
        $formattedValue = number_format($value, 2);

        return new Response($formattedValue);
    }
}