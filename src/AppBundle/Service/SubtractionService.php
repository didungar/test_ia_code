<?php
// src/AppBundle/Service/SubtractionService.php
namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\Request;

class SubtractionService
{
    public function subtract(int $a, int $b): int
    {
        return $a - $b;
    }
}