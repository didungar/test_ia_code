<?php
// src/Controller/OperationController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OperationController extends Controller
{
    /**
     * @Route("/operation", name="operation")
     */
    public function index(Request $request): Response
    {
        // Récupérer les données de la requête
        $number1 = (int) $request->query->get('number1');
        $number2 = (int) $request->query->get('number2');
        
        // Effectuer l'opération
        $result = $number1 + $number2;
        
        // Récupérer la réponse de l'API
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode(['result' => $result]));
        
        return $response;
    }
}