<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GameplayRulesController extends AbstractController
{
    /**
     * @Route("/gameplay-rules", name="gameplay_rules")
     */
    public function index(Request $request)
    {
        // Recherche les règles de jeu approuvées
        $approvedRules = [];
        foreach ($this->getDoctrine()->getRepository('App:Game')->findAll() as $game) {
            if ($game->isApproved()) {
                $approvedRules[] = $game->getRule();
            }
        }

        // Analyse et définit les règles de jeu en fonction des règles approuvées
        $gameplayRules = [];
        foreach ($approvedRules as $rule) {
            if (!empty($rule)) {
                $gameplayRules[] = $rule;
            }
        }

        // Renvoie les règles de jeu en format JSON
        return $this->json($gameplayRules);
    }
}