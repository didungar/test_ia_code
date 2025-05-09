<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DecimalDisplayTest extends WebTestCase
{
    public function testDecimalDisplay()
    {
        $client = static::createClient();

        // Vérification de la décimale affichée dans la page d'accueil
        $crawler = $client->request('GET', '/');
        $this->assertEquals(0.5, $crawler->filter('.decimal')->text());
    }
}