<?php
// src/Tests/Integration/CalculatorTest.php

namespace Tests\Integration;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CalculatorTest extends WebTestCase
{
    public function testAddition()
    {
        $client = static::createClient();

        // On envoie une requête POST pour ajouter 2 et 3.
        $crawler = $client->request('POST', '/add', ['a' => 2, 'b' => 3]);

        // On vérifie que la réponse est un JSON avec le résultat de l'addition.
        $this->assertEquals(5, $crawler->filter('#result')->text());
    }
}