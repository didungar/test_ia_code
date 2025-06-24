<?php
// score.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/save-scores")
 */
class ScoreController extends Controller
{
    /**
     * Save scores function
     *
     * @param Request $request
     * @return Response
     */
    public function saveScoresAction(Request $request)
    {
        // Get the scores from the request body
        $scores = json_decode($request->getContent(), true);

        // Save the scores to the file
        $file = fopen('score.txt', 'w');
        foreach ($scores as $score) {
            fwrite($file, $score['name'] . ';' . $score['points'] . PHP_EOL);
        }
        fclose($file);

        // Return a success response
        return new Response('Scores saved successfully');
    }
}