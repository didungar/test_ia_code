<?php
// src/AppBundle/Controller/MyController.php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Decimal;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;

class MyController extends Controller
{
    /**
     * @Route("/decimals", name="decimals_handler")
     */
    public function decimalsHandlerAction()
    {
        $request = $this->get('request');
        $data = json_decode($request->getContent(), true);

        // Check if the request contains a valid decimal value
        if (!filter_var($data['value'], FILTER_VALIDATE_FLOAT)) {
            return new Response(json_encode([
                'error' => 'Invalid decimal value provided.'
            ]));
        }

        // Check if the request contains a valid minimum value
        if (!filter_var($data['min'], FILTER_VALIDATE_FLOAT)) {
            return new Response(json_encode([
                'error' => 'Invalid minimum value provided.'
            ]));
        }

        // Check if the request contains a valid maximum value
        if (!filter_var($data['max'], FILTER_VALIDATE_FLOAT)) {
            return new Response(json_encode([
                'error' => 'Invalid maximum value provided.'
            ]));
        }

        // Convert the request data to a decimal number
        $value = (float) $data['value'];
        $min = (float) $data['min'];
        $max = (float) $data['max'];

        // Validate the decimal value
        if ($value < $min || $value > $max) {
            return new Response(json_encode([
                'error' => sprintf('Decimal value must be between %s and %s.', $min, $max)
            ]));
        }

        // Return the validated decimal value as a JSON response
        return new Response(json_encode([
            'value' => $value
        ]));
    }
}