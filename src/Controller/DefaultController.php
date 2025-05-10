<?php
// src/Controller/DefaultController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    public function divisionDecimalParEntier(Request $request)
    {
        // Récupérer les données envoyées par le formulaire
        $nombre = $request->get('nombre');
        $diviseur = $request->get('diviseur');

        // Vérifier si les données sont valides
        if (!is_numeric($nombre) || !is_int($diviseur)) {
            throw new \Exception("Les données envoyées ne sont pas valides.");
        }

        // Effectuer la division décimale par entier
        $resultat = $nombre / $diviseur;

        // Afficher le résultat dans une page HTML
        return $this->render('default/index.html.twig', [
            'title' => 'Division décimale par entier',
            'resultat' => $resultat,
        ]);
    }
}