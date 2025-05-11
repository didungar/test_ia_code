<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MyTestSuite extends WebTestCase
{
    public function testHomepage()
    {
        $client = static::createClient();

        // Test that the homepage is accessible and contains certain text
        $crawler = $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to my website!', $crawler->filter('.container h1')->text());
    }

    public function testLogin()
    {
        // Test that a user can log in successfully
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('_submit')->form();
        $form['username'] = 'johndoe';
        $form['password'] = 'password123';

        $client->submit($form);

        $this->assertTrue($client->getResponse()->isRedirect());
        $client->followRedirect();

        // Test that the user is logged in and has access to restricted pages
        $crawler = $client->request('GET', '/restricted');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome johndoe!', $crawler->filter('.container h1')->text());
    }
}