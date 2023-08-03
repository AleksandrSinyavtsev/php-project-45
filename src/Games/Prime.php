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
    for ($userAttempts = 0; $userAttempts < ROUNDS_COUNT + 1; $userAttempts += 1) {
        $number = rand(2, 100);
        $correctAnswer = isPrime($number) ? 'yes' : 'no';
        $question = "$number";
        $gameData[] = [$question, $correctAnswer];
    }
    startGame(RULES, $gameData);
}
