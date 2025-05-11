<?php
// src/Controller/NumberController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NumberController extends AbstractController
{
    /**
     * @Route("/number", name="number")
     */
    public function index(Request $request): Response
    {
        $number = 1234567890;
        return $this->render('index.html.twig', [
            'number' => number_format($number, 2),
        ]);
    }
}