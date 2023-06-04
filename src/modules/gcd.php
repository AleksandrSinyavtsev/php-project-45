<?php

namespace src\modules\gcd;

use function src\modules\Engine\startGame;

use const src\modules\Engine\ATTEMPT_COUNT;

const RULES = 'Find the greatest common divisor of given numbers.';

function findGCD(int $number1, int $number2): int
{
    if ($number1 >= $number2) {
        $m = $number1;
        $n = $number2;
    } else {
        $m = $number2;
        $n = $number1;
    }
    while ($n > 0) {
        $temp = $m % $n;
        $m = $n;
        $n = $temp;
    }
    return $m;
}

function isCorrect(string $answer, int $number1, int $number2): bool
{
    if ($answer == findGCD($number1, $number2)) {
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
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $correctAnswer = strval(findGCD($number1, $number2));
        $question = "$number1 $number2";
        $gameData[] = [$question, $correctAnswer];
        $userAttempts++;
    }
    startGame(RULES, $gameData);
}
