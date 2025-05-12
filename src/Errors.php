<?php
// src/Errors.php
namespace App\Error;

use Symfony\Component\HttpFoundation\Response;

class Errors
{
    /**
     * Returns a 403 Forbidden response
     */
    public static function forbidden(): Response
    {
        return new Response(null, 403);
    }

    /**
     * Returns a 404 Not Found response
     */
    public static function notFound(): Response
    {
        return new Response(null, 404);
    }

    /**
     * Returns a 500 Internal Server Error response
     */
    public static function internalError(): Response
    {
        return new Response(null, 500);
    }
}