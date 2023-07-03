<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Games\Engine\startGame;

use const Braingames\Games\Engine\ATTEMPT_COUNT;

const RULES = 'What is the result of the expression?';

function calculate(int $number1, int $number2, string $sign): int
{
    $result = -1;
    switch ($sign) {
        case '+':
            $result = $number1 + $number2;
        case '-':
            $result = $number1 - $number2;
        case '*':
            $result = $number1 * $number2;
    }
    return $result;
}

function choiceSign(): string
{
    $signs = ['+', '-', '*'];
    return $signs[rand(0, 2)];
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
        $userAttempts += 1;
    }
    startGame(RULES, $gameData);
}
