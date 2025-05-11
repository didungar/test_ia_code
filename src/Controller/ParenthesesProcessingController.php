<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ParenthesesProcessingController extends Controller
{
    /**
     * @Route("/parentheses/process", name="parentheses_process")
     */
    public function processParentheses(Request $request)
    {
        // Get the input string from the request
        $inputString = $request->get('input');

        // Process the parentheses in the input string
        $outputString = $this->processParentheses($inputString);

        // Return the output string as a response
        return new Response($outputString);
    }

    /**
     * @param string $inputString The input string to process
     * @return string The processed output string
     */
    private function processParentheses(string $inputString): string
    {
        // Initialize the output string
        $outputString = '';

        // Iterate through each character in the input string
        for ($i = 0; $i < strlen($inputString); $i++) {
            // If the current character is a left parenthesis, add it to the output string
            if ($inputString[$i] === '(') {
                $outputString .= $inputString[$i];
            }

            // If the current character is a right parenthesis, remove the last left parenthesis from the output string and append the right parenthesis
            elseif ($inputString[$i] === ')') {
                if (strlen($outputString) > 0) {
                    $outputString = substr($outputString, 0, -1);
                }
                $outputString .= $inputString[$i];
            }
        }

        return $outputString;
    }
}