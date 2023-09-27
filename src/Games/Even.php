<?php

namespace BrainGames\Games\Even;

use function BrainGames\Games\Engine\startGame;

use const BrainGames\Games\Engine\ROUNDS_COUNT;

const RULE = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function run(): void
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $number = rand(1, 100);
        $correctAnswer = isEven($number) ? 'yes' : 'no';
        $gameData[] = [$number, $correctAnswer];
    }
    startGame(RULE, $gameData);
}
