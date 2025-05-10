<?php
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Exception\UnknownOperationException;

class DefaultController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // Gestion des erreurs liées à des opérations non reconnues
        try {
            $operation = $request->get('operation');
            if (!$operation || !is_string($operation)) {
                throw new UnknownOperationException("L'opération spécifiée est inconnue.");
            }
            // Code d'exemple pour l'opération "add"
            if ($operation === 'add') {
                $x = (int) $request->get('x');
                $y = (int) $request->get('y');
                return new Response($x + $y);
            }
        } catch (UnknownOperationException $e) {
            // Gestion de l'erreur pour les opérations non reconnues
            return new Response($e->getMessage(), 400);
        }
    }
}