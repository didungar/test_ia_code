<?php
// src/AppBundle/Controller/MyController.php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MyController extends Controller
{
    /**
     * @Route("/subtraction", name="subtraction")
     */
    public function subtractionAction(Request $request)
    {
        // Get the inputs from the request
        $a = $request->get('a');
        $b = $request->get('b');

        // Perform the subtraction
        $result = $a - $b;

        // Return the result as a JSON response
        return new JsonResponse(['result' => $result]);
    }
}