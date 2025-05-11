<?php
// src/Validator/UserInputValidator.php
namespace App\Validator;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class UserInputValidator
{
    /**
     * @var Request $request
     */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Validate user input
     *
     * @param mixed $data
     * @return void
     */
    public function validate($data): void
    {
        // Définissez les contraintes pour la validation du formulaire
        $constraints = [
            new Assert\NotBlank(),
            new Assert\Length(['min' => 3, 'max' => 25]),
            new Assert\Email()
        ];

        // Utilisez les composants de Symfony pour valider l'entrée de l'utilisateur
        $violations = $this->validator->validate($data, $constraints);

        if (count($violations) > 0) {
            throw new Exception('Invalid input');
        }
    }
}