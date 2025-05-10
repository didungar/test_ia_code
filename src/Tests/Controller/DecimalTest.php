<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DecimalTest extends WebTestCase
{
    public function testDecimal()
    {
        $client = static::createClient();

        // Envoi de la requête à l'API
        $response = $client->request('GET', '/api/decimals');

        // Vérification du code de réponse HTTP (200)
        $this->assertEquals(200, $response->getStatusCode());

        // Vérification que la réponse contient au moins un décimal
        $this->assertGreaterThanOrEqual(1, count($response->toArray()));

        // Vérification de chaque décimal pour s'assurer qu'il est un nombre à virgule flottante valide
        foreach ($response->toArray() as $decimal) {
            $this->assertTrue(is_float($decimal));
        }
    }
}