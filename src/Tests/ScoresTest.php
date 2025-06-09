<?php
// /tests/ScoresTest.php
namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Service\ScoreStorage;

class ScoresTest extends TestCase
{
    private $scoreStorage;

    public function setUp()
    {
        $this->scoreStorage = new ScoreStorage();
    }

    public function tearDown()
    {
        $this->scoreStorage = null;
    }

    public function testStoreScore()
    {
        // Test that the score is stored correctly
        $score = 100;
        $this->scoreStorage->storeScore($score);
        $storedScore = $this->scoreStorage->getStoredScore();
        $this->assertEquals($score, $storedScore);
    }

    public function testRetrieveScore()
    {
        // Test that the score is retrieved correctly
        $score = 100;
        $this->scoreStorage->storeScore($score);
        $retrievedScore = $this->scoreStorage->getStoredScore();
        $this->assertEquals($score, $retrievedScore);
    }
}