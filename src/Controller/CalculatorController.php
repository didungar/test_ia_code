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
    public function calculator(Request $request)
    {
        // Initialize the stack
        $stack = [];

        // Add the first number to the stack
        if ($request->query->get('num1') !== null) {
            $stack[] = (int) $request->query->get('num1');
        }

        // Perform the operation based on the button pressed
        switch ($request->query->get('operator')) {
            case '+':
                // Addition
                if ($request->query->get('num2') !== null) {
                    $stack[] = (int) $request->query->get('num2');
                } else {
                    throw new \InvalidArgumentException('Missing second number for addition');
                }
                break;
            case '-':
                // Subtraction
                if ($request->query->get('num2') !== null) {
                    $stack[] = -(int) $request->query->get('num2');
                } else {
                    throw new \InvalidArgumentException('Missing second number for subtraction');
                }
                break;
            case '*':
                // Multiplication
                if ($request->query->get('num2') !== null) {
                    $stack[] = (int) $request->query->get('num1') * (int) $request->query->get('num2');
                } else {
                    throw new \InvalidArgumentException('Missing second number for multiplication');
                }
                break;
            case '/':
                // Division
                if ($request->query->get('num2') !== null) {
                    $stack[] = (int) $request->query->get('num1') / (int) $request->query->get('num2');
                } else {
                    throw new \InvalidArgumentException('Missing second number for division');
                }
                break;
            default:
                // Unsupported operator
                throw new \InvalidArgumentException(sprintf('Unsupported operator "%s"', $request->query->get('operator')));
        }

        // Update the stack based on the button pressed
        switch ($request->query->get('button')) {
            case '=':
                // Calculate the result and update the stack
                if (count($stack) === 2) {
                    $result = array_sum($stack);
                    $stack = [$result];
                } else {
                    throw new \InvalidArgumentException('Invalid number of operands');
                }
                break;
            case '+':
            case '-':
            case '*':
            case '/':
                // Add the next number to the stack
                if ($request->query->get('num2') !== null) {
                    $stack[] = (int) $request->query->get('num2');
                } else {
                    throw new \InvalidArgumentException('Missing second number for operation');
                }
                break;
            default:
                // Unsupported button
                throw new \InvalidArgumentException(sprintf('Unsupported button "%s"', $request->query->get('button')));
        }

        // Return the updated stack as JSON
        return $this->json($stack, 200);
    }
}