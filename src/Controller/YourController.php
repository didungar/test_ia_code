<?php
// src/Controller/YourController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class YourController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request): Response
    {
        try {
            // Code to handle the request goes here
        } catch (HttpExceptionInterface $exception) {
            return new Response('Error: ' . $exception->getMessage(), 500);
        }
    }
}