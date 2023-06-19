<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Games\Engine\startGame;

use const BrainGames\Games\Engine\ATTEMPT_COUNT;

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
