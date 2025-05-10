<?php
// src/Test/ValidationTest.php

namespace App\Test;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ValidationTest extends KernelTestCase
{
    public function testValidateResults()
    {
        // Create a new validation object with the default rules
        $validation = new \Symfony\Component\Validator\Validation();

        // Define the data to validate
        $data = [
            'result' => 10,
            'expected_result' => 20,
        ];

        // Create a new validation context for the data
        $context = $validation->createContext($data);

        // Add a new rule to validate the result
        $context->addRule(new \Symfony\Component\Validator\Constraints\EqualTo([
            'value' => 20,
        ]));

        // Validate the data
        $violations = $validation->validate($data, $context);

        // Check if there are any violations
        if (count($violations) > 0) {
            // Display an error message
            echo 'The result is not equal to 20.';
        } else {
            // The data is valid, continue with the next step
            echo 'The result is equal to 20.';
        }
    }
}