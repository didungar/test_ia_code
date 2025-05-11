<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MyControllerTest extends WebTestCase
{
    public function testMyAction()
    {
        $client = self::createClient();
        $crawler = $client->request('GET', '/my-action');

        // Assertions
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('My Action', $crawler->filter('.title')->text());
    }
}