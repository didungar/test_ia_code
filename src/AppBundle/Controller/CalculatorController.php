<?php
// src/Controller/CalculatorController.php
namespace Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CalculatorController extends Controller
{
    public function calculateAction(Request $request)
    {
        // Handle edge cases for zero and one operands
        if ($request->get('operand1') == 0 || $request->get('operand2') == 0) {
            return new Response('Invalid input: at least one of the operands must be non-zero.', 400);
        }

        // Perform calculation
        $result = (int) $request->get('operand1') + (int) $request->get('operand2');

        return new Response(sprintf('%d + %d = %d', $request->get('operand1'), $request->get('operand2'), $result));
    }
}