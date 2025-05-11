<?php
// src/Controller/MathController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class MathController extends AbstractController
{
    public function calculateSquareRootAction(Request $request)
    {
        // On récupère les données de la requête
        $number = (float)$request->get('number');

        // On calcule la racine carrée du nombre
        $squareRoot = sqrt($number);

        // On renvoie le résultat sous forme d'une réponse HTTP
        return $this->json([
            'result' => $squareRoot,
        ]);
    }
}