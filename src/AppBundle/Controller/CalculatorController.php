<?php
// src/Controller/CalculatorController.php

namespace Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CalculatorController extends Controller
{
    /**
     * @Route("/calculator", name="calculator")
     */
    public function indexAction(Request $request)
    {
        // Create a form object with the "multiplication" field
        $form = $this->createFormBuilder()
            ->add('multiplication', NumberType::class, [
                'label' => 'Multiplication',
                'attr' => ['placeholder' => 'Enter numbers to multiply']
            ])
            ->getForm();

        // Handle the form submission
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $multiplication = $data['multiplication'];

            // Multiply the numbers and display the result
            $result = $this->multiply($multiplication);
            echo 'Result: ' . $result;
        }

        return $this->render('calculator/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * Multiply two numbers
     *
     * @param int $a The first number
     * @param int $b The second number
     * @return int The result of the multiplication
     */
    private function multiply($a, $b)
    {
        return $a * $b;
    }
}