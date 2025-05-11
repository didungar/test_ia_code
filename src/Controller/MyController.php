<?php
// src/Controller/MyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MyController extends AbstractController
{
    /**
     * @Route("/my/route", name="my_route")
     */
    public function myAction(Request $request)
    {
        // Vérification du champ d'entrée vide
        if (empty($request->get('field'))) {
            // Si le champ est vide, on affiche un message d'erreur
            return $this->render('my_template.html.twig', [
                'error' => true,
            ]);
        } else {
            // Si le champ n'est pas vide, on continue avec l'action
            return $this->render('my_template.html.twig', [
                'error' => false,
            ]);
        }
    }
}