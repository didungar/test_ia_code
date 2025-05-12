<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        $number1 = 10;
        $number2 = 5;

        if ($number1 > $number2) {
            return new Response('Le nombre 1 est supérieur au nombre 2');
        } elseif ($number1 < $number2) {
            return new Response('Le nombre 1 est inférieur au nombre 2');
        } else {
            return new Response('Les deux nombres sont égaux');
        }
    }
}