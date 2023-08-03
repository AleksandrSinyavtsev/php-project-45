<?php

namespace BrainGames\Games\Even;

use function BrainGames\Games\Engine\startGame;

use const BrainGames\Games\Engine\ROUNDS_COUNT;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $n): bool
{
    return $n % 2 === 0;
}

function run()
{
    $gameData = [];
    for ($userAttempts = 0; $userAttempts < ROUNDS_COUNT; $userAttempts += 1) {
        $number = rand(1, 100);
        $correctAnswer = isEven($number) ? 'yes' : 'no';
        $question = $number;
        $gameData[] = [$question, $correctAnswer];
    }
    startGame(RULES, $gameData);
}
