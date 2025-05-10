<?php
// src/Entity/Operation.php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OperationRepository")
 */
class Operation
{
    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Choice(choices={"+", "-", "*", "/"}, message="Choose a valid operator.")
     */
    private $symbol;

    // ...
}