<?php
// src/AppBundle/Entity/MathOperations.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MathOperationsRepository")
 */
class MathOperations
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var float
     * @ORM\Column(type="float", nullable=true)
     */
    private $a;

    /**
     * @var float
     * @ORM\Column(type="float", nullable=true)
     */
    private $b;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $operation;

    public function getId(): int
    {
        return $this->id;
    }

    public function setA(?float $a): self
    {
        $this->a = $a;

        return $this;
    }

    public function getA(): ?float
    {
        return $this->a;
    }

    public function setB(?float $b): self
    {
        $this->b = $b;

        return $this;
    }

    public function getB(): ?float
    {
        return $this->b;
    }

    public function setOperation(string $operation): self
    {
        $this->operation = $operation;

        return $this;
    }

    public function getOperation(): string
    {
        return $this->operation;
    }
}