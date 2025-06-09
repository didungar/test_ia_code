<?php
// game.php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$data = $request->query->get('data');

if ($data) {
    // save data to database
    $repository = $this->getDoctrine()->getRepository(GameData::class);
    $gameData = new GameData($data);
    $repository->persist($gameData);

    // return response
    $response = new Response();
    $response->headers->set('Content-Type', 'application/json');
    $response->setContent(json_encode([
        'status' => 'success',
        'message' => 'Data saved successfully!'
    ]));

    return $response;
} else {
    // return error response
    $response = new Response();
    $response->headers->set('Content-Type', 'application/json');
    $response->setContent(json_encode([
        'status' => 'error',
        'message' => 'No data received!'
    ]));

    return $response;
}