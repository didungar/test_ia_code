<?php
// src/Controller/CalculatorController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Service\Calculator;

class CalculatorController extends AbstractController
{
    /**
     * @Route("/calculator", name="calculator")
     */
    public function index(Request $request)
    {
        // Création d'une instance de la classe Calculator
        $calculator = new Calculator();

        // Récupération des données entrées par l'utilisateur
        $number1 = $request->get('number1');
        $number2 = $request->get('number2');
        $operation = $request->get('operation');

        // Validation du résultat du calcul
        if ($calculator->validateResult($number1, $number2, $operation)) {
            // Si le résultat est valide, on affiche un message de succès
            $this->addFlash('success', 'Le résultat du calcul est valide.');
        } else {
            // Sinon, on affiche un message d'erreur
            $this->addFlash('error', 'Le résultat du calcul n\'est pas valide.');
        }

        return new Response();
    }
}