<?php
// game.php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Fonction pour vérifier si les termes et conditions ont été acceptés
function checkTerms(Request $request) {
    // Si la clé 'accepted_terms' est présente dans l'objet de requête, elle doit avoir la valeur true
    if ($request->query->has('accepted_terms') && $request->query->get('accepted_terms') === true) {
        // Les termes et conditions ont été acceptés, on peut continuer
        return;
    } else {
        // Les termes et conditions n'ont pas été acceptés, on arrête le jeu
        throw new \Exception("You must accept the terms and conditions to play the game.");
    }
}

// Fonction pour lancer le jeu avec vérification des termes et conditions
function startGame(Request $request) {
    // On vérifie si les termes et conditions ont été acceptés
    checkTerms($request);

    // On continue à lancer le jeu
    echo "Welcome to the game!";
}