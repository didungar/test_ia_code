<?php
// src/AppBundle/Service/Calculator.php
namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Calculator
{
    public function add(int $a, int $b): int
    {
        return $a + $b;
    }
}