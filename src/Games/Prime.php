<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Games\Engine\startGame;

use const BrainGames\Games\Engine\ROUNDS_COUNT;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number): bool
{
    $dividersCount = 0;
    for ($i = 1; $i <= $number; $i += 1) {
        if ($number % $i == 0) {
            $dividersCount += 1;
        }
    }
    return $dividersCount <= 2;
}

function run()
{
    $gameData = [];
    $userAttempts = 0;
    while ($userAttempts < ROUNDS_COUNT) {
        $number = rand(2, 100);
        $correctAnswer = isPrime($number) ? 'yes' : 'no';
        $question = "$number";
        $gameData[] = [$question, $correctAnswer];
        $userAttempts += 1;
    }
    startGame(RULES, $gameData);
}
