<?php
// src/AppBundle/Tests/Controller/ProductControllerTest.php
namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        // Vérifiez que la page d'accueil est affichée
        $crawler = $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Hello World', $crawler->filter('#container h1')->text());

        // Vérifiez que la page de détail est affichée
        $crawler = $client->request('GET', '/product/1');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Product 1', $crawler->filter('#container h2')->text());
    }
}