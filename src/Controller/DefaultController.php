<?php
// src/Controller/DefaultController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/result", name="result")
     */
    public function result(Request $request)
    {
        // Get the result from the request
        $result = $request->get('result');

        // Check if the result is null
        if ($result === null) {
            // If the result is null, return an error message
            return $this->render('error.html.twig', [
                'message' => 'Error: No result was found.'
            ]);
        } else {
            // If the result is not null, render the template with the result
            return $this->render('result.html.twig', [
                'result' => $result
            ]);
        }
    }
}