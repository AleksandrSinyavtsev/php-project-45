<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Games\Engine\startGame;

use const BrainGames\Games\Engine\ROUNDS_COUNT;

const RULE = 'What number is missing in the progression?';

function generateProgression(int $startItem, int $step, int $itemsCount = 10): array
{

    $prog = [];
    for ($i = 0; $i < $itemsCount; $i += 1) {
        $prog[] = $startItem + $step * $i;
    }
    return $prog;
}

function run(): void
{

    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $startItem = rand(1, 100);
        $step = rand(1, 10);
        $progression = generateProgression($startItem, $step);
        $keyIndex = array_rand($progression);
        $keyNumber = $progression[$keyIndex];
        $preparingProgression = $progression;
        $preparingProgression[$keyIndex] = '..';
        $correctAnswer = strval($keyNumber);
        $question = implode(' ', $preparingProgression);
        $gameData[] = [$question, $correctAnswer];
    }
        startGame(RULE, $gameData);
}
