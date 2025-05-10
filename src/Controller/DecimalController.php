<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DecimalController extends AbstractController
{
    /**
     * @Route("/decimal", name="decimal")
     */
    public function index(Request $request): Response
    {
        // Récupération de la valeur du paramètre "number" dans l'URL
        $number = $request->query->get('number');

        // Gestion des cas d'utilisation spécifiques pour les décimales
        if ($number === null) {
            return $this->redirectToRoute('homepage');
        } elseif (is_numeric($number)) {
            // La valeur est un nombre, on la mets en forme avec des décimales
            $formattedNumber = number_format($number, 2);
            return $this->render('decimal/index.html.twig', [
                'number' => $formattedNumber,
            ]);
        } else {
            // La valeur n'est pas un nombre, on affiche une erreur
            return $this->render('decimal/error.html.twig');
        }
    }
}