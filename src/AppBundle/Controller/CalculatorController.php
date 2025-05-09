<?php
// src/AppBundle/Controller/CalculatorController.php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Number;

class CalculatorController extends Controller
{
    /**
     * @Route("/multiply", name="multiply")
     */
    public function multiplyAction(Request $request)
    {
        // Extraction des paramètres de la requête
        $firstNumber = intval($request->query->get('firstNumber'));
        $secondNumber = intval($request->query->get('secondNumber'));

        // Création d'un objet Number pour stocker le résultat de la multiplication
        $result = new Number();

        // Appel de la méthode multiply() pour calculer le produit des nombres
        $result->multiply($firstNumber, $secondNumber);

        // Enregistrement du résultat dans une variable
        $product = $result->getResult();

        // Création d'une réponse HTTP avec le résultat de la multiplication
        return new Response(json_encode(['product' => $product]));
    }
}