<?php
// src/AppBundle/Controller/NombreIdentiqueController.php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NombreIdentiqueController
{
    /**
     * @Route("/nombre-identique", name="nombre_identique")
     */
    public function indexAction(Request $request)
    {
        // Récupérer les nombres de la requête
        $nombres = $request->query->get('nombres');

        // Valider le nombre d'arguments
        if (count($nombres) < 2) {
            throw new \Exception("Le nombre d'arguments minimum est 2");
        }

        // Vérifier si les nombres sont identiques
        $identique = true;
        for ($i = 0; $i < count($nombres); $i++) {
            if ($nombres[$i] !== $nombres[count($nombres) - 1]) {
                $identique = false;
                break;
            }
        }

        // Envoyer la réponse
        return new Response(json_encode([
            'result' => $identique ? 'Les nombres sont identiques' : 'Les nombres ne sont pas identiques',
        ]));
    }
}