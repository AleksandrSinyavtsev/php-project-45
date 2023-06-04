<?php

namespace src\modules\even;

use function src\modules\Engine\startGame;

use const src\modules\Engine\ATTEMPT_COUNT;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $n): string
{
    if ($n % 2 === 0) {
        return 'yes';
    } else {
        return 'no';
    }
}

function isCorrect(string $answer, int $number): bool
{
    if ($answer === isEven($number)) {
        return true;
    } else {
        return false;
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
