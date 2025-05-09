<?php
// src/AppBundle/Controller/MyController.php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MyController extends Controller
{
    /**
     * @Route("/test")
     */
    public function testAction(Request $request)
    {
        // Créer une instance de la classe Calculatrice
        $calculatrice = new Calculatrice();

        // Effectuer l'opération simple
        $resultat = $calculatrice->additionner(2, 3);

        // Afficher le résultat
        return new Response($resultat);
    }
}