<?php
// error_handler.php
namespace App\ErrorHandler;

use Symfony\Component\Debug\Exception\FatalThrowableError;
use Symfony\Component\HttpFoundation\JsonResponse;

class ErrorHandler
{
    public function handleError(int $errorCode, string $message = null)
    {
        // Vérifiez si l'erreur est un fatal error
        if ($errorCode === E_ERROR || $errorCode === E_CORE_ERROR || $errorCode === E_COMPILE_ERROR) {
            throw new FatalThrowableError($message, 0, null);
        } else {
            // Gérer l'erreur en utilisant le système de logging
            // Si vous souhaitez utiliser un fichier de log, il est recommandé d'utiliser le composant Symfony\Component\HttpFoundation\FileLogger
            // Vous pouvez également personnaliser la façon dont les erreurs sont enregistrées en utilisant des gestionnaires d'erreurs spécifiques à votre application
        }
    }
}