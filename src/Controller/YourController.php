<?php
// src/Controller/YourController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class YourController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request): Response
    {
        // Parse the input data from the request
        $inputData = $request->getContent();

        // Process the input data as needed
        $processedInputData = $this->processInputData($inputData);

        // Return a response with the processed data
        return new Response($processedInputData);
    }

    /**
     * Process the input data and return the processed output
     */
    private function processInputData($inputData): string
    {
        // Do something with the input data here, e.g. validate it, transform it, etc.
        $processedInputData = 'Processed input data';

        return $processedInputData;
    }
}