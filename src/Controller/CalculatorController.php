<?php
// src/Controller/CalculatorController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    /**
     * @Route("/calculator", name="calculator")
     */
    public function index(Request $request)
    {
        return $this->render('calculator/index.html.twig');
    }

    /**
     * @Route("/add", name="add")
     */
    public function add()
    {
        // Calculate the sum of two numbers
        $a = 10;
        $b = 20;
        $sum = $a + $b;

        return new Response($this->renderView('calculator/add.html.twig', [
            'a' => $a,
            'b' => $b,
            'sum' => $sum
        ]));
    }

    /**
     * @Route("/subtract", name="subtract")
     */
    public function subtract()
    {
        // Calculate the difference between two numbers
        $a = 10;
        $b = 20;
        $difference = $a - $b;

        return new Response($this->renderView('calculator/subtract.html.twig', [
            'a' => $a,
            'b' => $b,
            'difference' => $difference
        ]));
    }

    /**
     * @Route("/multiply", name="multiply")
     */
    public function multiply()
    {
        // Calculate the product of two numbers
        $a = 10;
        $b = 20;
        $product = $a * $b;

        return new Response($this->renderView('calculator/multiply.html.twig', [
            'a' => $a,
            'b' => $b,
            'product' => $product
        ]));
    }

    /**
     * @Route("/divide", name="divide")
     */
    public function divide()
    {
        // Calculate the quotient of two numbers
        $a = 10;
        $b = 20;
        $quotient = $a / $b;

        return new Response($this->renderView('calculator/divide.html.twig', [
            'a' => $a,
            'b' => $b,
            'quotient' => $quotient
        ]));
    }
}