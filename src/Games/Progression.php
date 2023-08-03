<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Games\Engine\startGame;

use const BrainGames\Games\Engine\ROUNDS_COUNT;

const RULES = 'What number is missing in the progression?';

function generateProgression(int $startItem, int $step, int $itemsCount): array
{

    $prog = [];
    $index = 0;
    while ($index < $itemsCount) {
        $prog[] = $startItem;
        $startItem += $step;
        $index += 1;
    }
    return $prog;
}

function run()
{

    $gameData = [];
    for ($userAttempts = 0; $userAttempts < ROUNDS_COUNT + 1; $userAttempts += 1) {
        $startItem = rand(1, 100);
        $itemsCount = 10;
        $step = rand(1, 10);
        $keyIndex = rand(0, 9);
        $progression = generateProgression($startItem, $step, $itemsCount);
        $keyNumber = $progression[$keyIndex];
        $preparingProgression = $progression;
        $preparingProgression[$keyIndex] = '..';
        $correctAnswer = strval($keyNumber);
        $question = implode(' ', $preparingProgression);
        $gameData[] = [$question, $correctAnswer];
    }
        startGame(RULES, $gameData);
}
