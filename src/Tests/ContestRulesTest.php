<?php
// tests/contest_rules_test.php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContestRulesTest extends TestCase
{
    public function testWinnerDetermination()
    {
        $winner = $this->getWinner();

        // Vérifie que le gagnant est un utilisateur autorisé
        $this->assertTrue($winner->isAuthorized());

        // Vérifie que le système de détermination du gagnant respecte les règles du concours
        $this->assertNotNull($winner);
        $this->assertEquals('App\Entity\User', get_class($winner));
    }
}