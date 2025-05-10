<?php
// src/Tests/Unit/ResultControllerTest.php
namespace App\Tests\Unit;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ResultControllerTest extends WebTestCase
{
    public function testDisplayResult()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/result');

        // Vérifiez que la page de résultat est affichée
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        // Vérifiez que le résultat est affiché dans la page
        $result = $crawler->filter('h1')->text();
        $this->assertNotEmpty($result);
    }
}