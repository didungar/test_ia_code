<?php
// src/AppBundle/Controller/CalculatorController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CalculatorController
{
    /**
     * @Route("/calculate", name="calculate")
     */
    public function calculateAction(Request $request)
    {
        // Récupérer les données de la requête HTTP
        $operation = $request->query->get('operation');
        $number1 = $request->query->get('number1');
        $number2 = $request->query->get('number2');

        // Effectuer l'opération arithmétique
        switch ($operation) {
            case 'add':
                $result = $number1 + $number2;
                break;
            case 'subtract':
                $result = $number1 - $number2;
                break;
            case 'multiply':
                $result = $number1 * $number2;
                break;
            case 'divide':
                $result = $number1 / $number2;
                break;
            default:
                throw new \Exception('Invalid operation');
        }

        // Afficher le résultat entier
        return new Response($result);
    }
}