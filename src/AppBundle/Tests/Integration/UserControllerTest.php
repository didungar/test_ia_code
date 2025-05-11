<?php
// src/AppBundle/Tests/Integration/UserControllerTest.php
namespace AppBundle\Tests\Integration;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testCreateUser()
    {
        $client = static::createClient();

        // Créer un utilisateur
        $user = new \AppBundle\Entity\User();
        $user->setUsername('johndoe');
        $user->setEmail('john.doe@example.com');
        $user->setPassword('password');

        // Envoyer une requête POST pour créer l'utilisateur
        $crawler = $client->request(
            'POST',
            '/users/create',
            [
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword()
            ]
        );

        // Vérifier que l'utilisateur a bien été créé
        $this->assertEquals(201, $client->getResponse()->getStatusCode());
        $this->assertTrue($crawler->filter('html:contains("User created successfully")')->count() > 0);
    }
}