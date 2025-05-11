<?php
// src/AppBundle/Service/MultiplicationService.php
namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\Response;

class MultiplicationService
{
    public function multiply($numbers)
    {
        $result = 1;

        foreach ($numbers as $number) {
            $result *= $number;
        }

        return new Response(json_encode(['result' => $result]));
    }
}