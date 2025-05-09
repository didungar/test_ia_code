<?php
// src/Controller/MyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class MyController extends AbstractController
{
    public function checkNumbers(Request $request)
    {
        // Get the numbers from the request
        $number1 = (int)$request->query->get('number1');
        $number2 = (int)$request->query->get('number2');

        // Check if the numbers are identical
        if ($number1 === $number2) {
            return true;
        } else {
            return false;
        }
    }
}