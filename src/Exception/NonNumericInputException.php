<?php

namespace App\Exception;

use Throwable;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class NonNumericInputException extends \RuntimeException implements HttpExceptionInterface
{
    private $input;

    public function __construct(string $input, Throwable $previous = null)
    {
        parent::__construct('Non-numeric input detected', 0, $previous);
        $this->input = $input;
    }

    /**
     * Returns the input that caused the exception.
     *
     * @return string
     */
    public function getInput(): string
    {
        return $this->input;
    }
}