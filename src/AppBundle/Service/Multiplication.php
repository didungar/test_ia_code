<?php
// src/Service/Multiplication.php
namespace Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Multiplication
{
    public function multiply(int $a, int $b)
    {
        return $a * $b;
    }
}