<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Games\Engine\startGame;

use const Braingames\Games\Engine\ATTEMPT_COUNT;

const RULES = 'What is the result of the expression?';

function calculate(int $number1, int $number2, string $sign)
{
    switch ($sign) {
        case '+':
            return $number1 + $number2;
        case '-':
            return $number1 - $number2;
        case '*':
            return $number1 * $number2;
    }
}

function choiceSign()
{
    $signs = ['+', '-', '*'];
    $sign = $signs[rand(0, 2)];
    return $sign;
}

function run()
{
    $gameData = [];
    $userAttempts = 0;
    while ($userAttempts < ATTEMPT_COUNT) {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $sign = choiceSign();
        $correctAnswer = strval(calculate($number1, $number2, $sign));
        $question = "$number1 $sign $number2";
        $gameData[] = [$question, $correctAnswer];
        $userAttempts++;
    }
    startGame(RULES, $gameData);
}
