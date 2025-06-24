<?php

namespace App\Tests\Unit;

use App\Entity\Score;
use App\Repository\ScoreRepository;
use PHPUnit\Framework\TestCase;

class ScoreTest extends TestCase
{
    private $scoreRepository;

    public function setUp(): void
    {
        $this->scoreRepository = self::getContainer()->get('doctrine')->getRepository(Score::class);
    }

    public function testUniqueWinner()
    {
        // Create 3 scores with different values
        $score1 = new Score();
        $score1->setValue(100);
        $this->scoreRepository->save($score1);

        $score2 = new Score();
        $score2->setValue(50);
        $this->scoreRepository->save($score2);

        $score3 = new Score();
        $score3->setValue(200);
        $this->scoreRepository->save($score3);

        // Verify that there is only one winner
        $winners = $this->scoreRepository->findBy(['value' => 100]);
        $this->assertCount(1, $winners);
    }
}