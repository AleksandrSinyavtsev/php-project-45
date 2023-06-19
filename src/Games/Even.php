<?php

namespace BrainGames\Games\Even;

use function BrainGames\Games\Engine\startGame;

use const BrainGames\Games\Engine\ATTEMPT_COUNT;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $n): bool
{
    return $n % 2 === 0;
}

function run()
{
    $gameData = [];
    $userAttempts = 0;
    while ($userAttempts < ATTEMPT_COUNT) {
        $number = rand(1, 100);
        $correctAnswer = isEven($number) ? 'yes' : 'no';
        $question = $number;
        $gameData[] = [$question, $correctAnswer];
        $userAttempts += 1;
    }
    startGame(RULES, $gameData);
}
