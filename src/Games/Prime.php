<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Games\Engine\startGame;

use const BrainGames\Games\Engine\ROUNDS_COUNT;

const RULE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number): bool
{
    for ($i = 2; $i < $number; $i += 1) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

function run(): void
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $number = rand(2, 100);
        $correctAnswer = isPrime($number) ? 'yes' : 'no';
        $question = "$number";
        $gameData[] = [$question, $correctAnswer];
    }
    startGame(RULE, $gameData);
}
