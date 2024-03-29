<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Games\Engine\startGame;

use const Braingames\Games\Engine\ROUNDS_COUNT;

const RULE = 'What is the result of the expression?';

function calculate(int $number1, int $number2, string $sign): int
{
    switch ($sign) {
        case '+':
            return $number1 + $number2;
        case '-':
            return $number1 - $number2;
        case '*':
            return $number1 * $number2;
        default:
            throw new \Exception('there are no real numbers to calculate');
    }
}

function run(): void
{
    $gameData = [];
    $signs = ['+', '-', '*'];
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $sign = $signs[rand(0, 2)];
        $correctAnswer = strval(calculate($number1, $number2, $sign));
        $gameData[] = ["$number1 $sign $number2", $correctAnswer];
    }
    startGame(RULE, $gameData);
}
