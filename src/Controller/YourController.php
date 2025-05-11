<?php
// src/Controller/YourController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class YourController extends AbstractController
{
    public function yourAction(Request $request)
    {
        // Vérifier si le paramètre "id" est un nombre
        $this->validateId($request->query->get('id'));
        
        // Procéder à votre traitement
        // ...
    }
    
    /**
     * Valide que le paramètre "id" est un nombre.
     *
     * @param mixed $value
     */
    private function validateId($value)
    {
        if (!is_numeric($value)) {
            throw new UnexpectedTypeException('Le paramètre "id" doit être un nombre');
        }
    }
}