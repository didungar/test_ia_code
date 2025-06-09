<?php
// scores/store.php

use Symfony\Component\HttpFoundation\Request;

/**
 * Stores a score in the database
 *
 * @param Request $request The request object
 */
function storeScore(Request $request) {
    // Get the score from the request
    $score = $request->get('score');

    // Connect to the database and prepare the query
    $db = new PDO('mysql:host=localhost;dbname=my_database', 'root', 'password');
    $stmt = $db->prepare('INSERT INTO scores (score) VALUES (:score)');

    // Bind the score to the prepared statement
    $stmt->bindValue(':score', $score);

    // Execute the query and store the result
    $result = $stmt->execute();

    // Close the database connection
    $db = null;
}