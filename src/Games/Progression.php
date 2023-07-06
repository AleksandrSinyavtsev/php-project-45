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

function makeKeyNumber(array $array, int $keyIndex): int
{

    $keyNumber = $array[$keyIndex];
    return $keyNumber;
}

function prepareProgression(array $array, int $keyIndex): array
{
    $temp = $array;
    $temp[$keyIndex] = '..';
    return $temp;
}

function run()
{

    $gameData = [];
    $userAttempts = 0;
    while ($userAttempts < ROUNDS_COUNT) {
        $startItem = rand(1, 100);
        $itemsCount = 10;
        $step = rand(1, 10);
        $keyIndex = rand(0, 9);
        $progression = generateProgression($startItem, $step, $itemsCount);
        $correctAnswer = strval(makeKeyNumber($progression, $keyIndex));
        $question = implode(' ', prepareProgression($progression, $keyIndex));
        $gameData[] = [$question, $correctAnswer];
        $userAttempts += 1;
    }
        startGame(RULES, $gameData);
}
