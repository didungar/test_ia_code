<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MultiplicationService
{
    /**
     * @Route("/multiply", methods={"GET"}, name="multiply")
     */
    public function multiply(Request $request): array
    {
        $numbers = explode(',', $request->query->get('numbers'));

        if (!is_array($numbers) || count($numbers) < 2) {
            throw new \InvalidArgumentException('Please provide at least two numbers to multiply');
        }

        $result = 1;
        foreach ($numbers as $number) {
            $result *= intval($number);
        }

        return ['result' => $result];
    }
}