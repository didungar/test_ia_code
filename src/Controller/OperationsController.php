<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Constraints as Assert;

class OperationsController extends AbstractController
{
    /**
     * @Assert\Arithmetic("operand1", "operator")
     */
    public function arithmeticAction($operand1, $operator)
    {
        // Your code to perform the arithmetic operation goes here
        
        return $this->render('your_template.html.twig', [
            'result' => $result
        ]);
    }
}