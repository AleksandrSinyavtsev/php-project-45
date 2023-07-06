<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Games\Engine\startGame;

use const BrainGames\Games\Engine\ROUNDS_COUNT;

const RULES = 'Find the greatest common divisor of given numbers.';

function findGCD(int $number1, int $number2): int
{
    if ($number1 >= $number2) {
        $firstNum = $number1;
        $secondNum = $number2;
    } else {
        $firstNum = $number2;
        $secondNum = $number1;
    }
    while ($secondNum > 0) {
        $temp = $firstNum % $secondNum;
        $firstNum = $secondNum;
        $secondNum = $temp;
    }
    return $firstNum;
}

function run()
{
    $gameData = [];
    $userAttempts = 0;
    while ($userAttempts < ROUNDS_COUNT) {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $correctAnswer = strval(findGCD($number1, $number2));
        $question = "$number1 $number2";
        $gameData[] = [$question, $correctAnswer];
        $userAttempts += 1;
    }
    startGame(RULES, $gameData);
}
