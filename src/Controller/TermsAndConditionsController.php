<?php
// src/Controller/TermsAndConditionsController.php

namespace App\Controller;

use Dompdf\Dompdf;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TermsAndConditionsController extends AbstractController
{
    public function index(Request $request)
    {
        // Get the terms and conditions from the project manager
        $terms = file_get_contents('terms_and_conditions.pdf');

        // Create a new instance of Dompdf
        $dompdf = new Dompdf();

        // Load the terms and conditions into the PDF document
        $dompdf->loadHtml($terms);

        // (Optional) Set the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Get the PDF bytes
        $pdf = $dompdf->output();

        // Return a Response with the PDF content
        return new Response($pdf, 200, array(
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="terms_and_conditions.pdf"'
        ));
    }
}