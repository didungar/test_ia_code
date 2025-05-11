<?php
// src/AppBundle/Services/AdditionService.php

namespace AppBundle\Services;

use Symfony\Component\HttpFoundation\Request;

class AdditionService
{
    /**
     * @param int $a
     * @param int $b
     * @return int
     */
    public function addition($a, $b)
    {
        return $a + $b;
    }
}