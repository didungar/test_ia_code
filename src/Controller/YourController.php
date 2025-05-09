<?php
// src/Controller/YourController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class YourController extends AbstractController
{
    public function yourAction(Request $request): Response
    {
        // Handle zero result
        if (empty($yourData)) {
            return $this->render('your_template.html.twig', [
                'message' => 'No data found.'
            ]);
        }

        // ...
    }
}