<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class OperatorPrecedenceController extends AbstractController
{
    public function evaluate(Request $request)
    {
        $expression = $request->query->get('expression');

        // Suppression des espaces inutiles dans l'expression
        $expression = trim($expression);

        // Recherche de la priorité d'opérateur dans l'expression
        $priority = 0;

        // On parcourt l'expression caractère par caractère
        for ($i = 0; $i < strlen($expression); $i++) {
            // Si le caractère est un opérateur, on incrémente la priorité
            if (in_array($expression[$i], ['+', '-', '*', '/'])) {
                $priority++;
            }
        }

        return $this->json(['priority' => $priority]);
    }
}