<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MultiplicationController extends BaseController
{
    /**
     * @Route("/multiply", name="multiply")
     */
    public function multiplyAction(Request $request)
    {
        $a = (int) $request->query->get('a');
        $b = (int) $request->query->get('b');

        if ($a < 0 || $b < 0) {
            throw new \Exception('Negative numbers are not allowed');
        }

        return new Response($a * $b);
    }
}