<?php
// /scores/retrieve.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ScoreController extends Controller
{
    public function retrieveAction(Request $request)
    {
        // Vérifiez si une requête spécifique a été demandée
        if ($request->query->has('id')) {
            // Recherchez un score par son ID
            $score = $this->getDoctrine()->getRepository(Score::class)->findOneBy(['id' => $request->query->get('id')]);
        } else {
            // Retrieve all scores
            $scores = $this->getDoctrine()->getRepository(Score::class)->findAll();
        }

        return new Response($scores);
    }
}