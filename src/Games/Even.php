<?php

namespace BrainGames\Games\Even;

use function BrainGames\Games\Engine\startGame;

use const BrainGames\Games\Engine\ATTEMPT_COUNT;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $n): string
{
    if ($n % 2 === 0) {
        return 'yes';
    } else {
        return 'no';
    }
}

function run()
{
    $gameData = [];
    $userAttempts = 0;
    while ($userAttempts < ATTEMPT_COUNT) {
        $number = rand(1, 100);
        $correctAnswer = isEven($number);
        $question = $number;
        $gameData[] = [$question, $correctAnswer];
        $userAttempts++;
    }
    startGame(RULES, $gameData);
}
