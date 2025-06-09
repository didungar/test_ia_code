<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class WinnerDeterminationController extends Controller
{
    /**
     * Calculate the winner of the contest based on the submission scores and the contest rules.
     *
     * @Route("/winner_determination", name="winner_determination")
     */
    public function index(Request $request): Response
    {
        // Get the list of submissions from the database
        $submissions = $this->getDoctrine()->getRepository('App\Entity\Submission')->findAll();

        // Calculate the total score for each submission
        foreach ($submissions as $submission) {
            $totalScore = 0;
            foreach ($submission->getScores() as $score) {
                $totalScore += $score['value'];
            }
            $submission->setTotalScore($totalScore);
        }

        // Determine the winner based on the total score
        usort($submissions, function ($a, $b) {
            return $b->getTotalScore() - $a->getTotalScore();
        });

        // Return the winner as a response
        return new Response($this->render('winner_determination/index.html.twig', [
            'submissions' => $submissions,
        ]));
    }
}