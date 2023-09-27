<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Games\Engine\startGame;

use const BrainGames\Games\Engine\ROUNDS_COUNT;

const RULE = 'Find the greatest common divisor of given numbers.';

function findGCD(int $max, int $min): int
{
    if ($max < $min) {
        [$max, $min] = [$min, $max];
    }
    while ($min > 0) {
        $temp = $max % $min;
        $max = $min;
        $min = $temp;
    }
    return $max;
}

function run(): void
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $correctAnswer = (string)(findGCD($number1, $number2));
        $gameData[] = ["$number1 $number2", $correctAnswer];
    }
    startGame(RULE, $gameData);
}
