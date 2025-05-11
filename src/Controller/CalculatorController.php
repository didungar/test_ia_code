<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends Controller
{
    /**
     * @Route("/calculate", name="calculate")
     */
    public function calculate(Request $request)
    {
        // Récupérer les données de la requête POST
        $operation = $request->request->get('operation');
        $num1 = floatval($request->request->get('num1'));
        $num2 = floatval($request->request->get('num2'));

        // Effectuer l'opération demandée
        switch ($operation) {
            case 'addition':
                $result = $num1 + $num2;
                break;
            case 'soustraction':
                $result = $num1 - $num2;
                break;
            case 'multiplication':
                $result = $num1 * $num2;
                break;
            case 'division':
                if ($num2 === 0) {
                    return new Response('Division par zéro !', 400);
                }
                $result = $num1 / $num2;
                break;
            default:
                return new Response('Opération non valide.', 400);
        }

        // Retourner le résultat de l'opération
        return new Response($result, 200);
    }
}