<?php
// src/Controller/TestCase2Controller.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TestCase2Controller extends AbstractController
{
    /**
     * @Route("/test-case-2", name="test_case_2")
     */
    public function index(Request $request)
    {
        $number = 5;

        // Multiply the number by zero
        $result = $number * 0;

        return $this->render('test_case_2/index.html.twig', [
            'number' => $number,
            'result' => $result,
        ]);
    }
}