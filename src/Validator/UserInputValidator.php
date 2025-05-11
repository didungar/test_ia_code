<?php
// src/Validator/UserInputValidator.php

namespace App\Validator;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class UserInputValidator {
    public function validate(Request $request) {
        // Récupération des données de la requête
        $data = json_decode($request->getContent(), true);

        // Validation des données
        $violations = $this->validator->validate($data, [
            new Assert\Type('name', 'string'),
            new Assert\NotBlank('name'),
            new Assert\Length(['min' => 3]),
            new Assert\Email('email'),
            new Assert\NotBlank('email')
        ]);

        // Gestion des violations
        if (count($violations) > 0) {
            throw new \Exception(sprintf('Invalid user input: %s', $violations[0]->getMessage()));
        }
    }
}