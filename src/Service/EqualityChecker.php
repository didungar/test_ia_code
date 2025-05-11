<?php

namespace App\Service;

use Symfony\Component\Validator\Constraints as Assert;

class EqualityChecker
{
    /**
     * @Assert\Length(min="2", max="4")
     */
    public $numbers;

    /**
     * @Assert\Range(min=0, max=10)
     */
    public $resultExpected;

    public function isEqual()
    {
        // Calculate the result obtained by multiplying the numbers together
        $resultObtained = 1;
        foreach ($this->numbers as $number) {
            $resultObtained *= $number;
        }

        // Compare the result obtained with the result expected
        if ($resultExpected === $resultObtained) {
            return true;
        } else {
            return false;
        }
    }
}