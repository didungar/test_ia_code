<?php

// 1. Créer une classe personnalisée pour gérer les erreurs d'opération invalides
namespace App\Exception;

use Symfony\Component\HttpFoundation\Response;

class InvalidOperationException extends \Exception
{
    public function __construct($message = null, $code = 0)
    {
        parent::__construct($message, $code);
    }

    // 2. Utiliser la méthode handle() pour gérer l'exception et renvoyer une réponse HTTP adaptée
    public function handle(Request $request, Exception $exception)
    {
        if ($exception instanceof InvalidOperationException) {
            return new Response('Erreur d\'opération invalide', 400);
        }

        // On poursuit le traitement normal de l'exception si elle n'est pas une erreur d'opération invalide
        return parent::handle($request, $exception);
    }
}