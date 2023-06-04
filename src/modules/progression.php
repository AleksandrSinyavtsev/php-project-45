<?php

namespace src\modules\progression;

use function src\modules\Engine\startGame;

use const src\modules\Engine\ATTEMPT_COUNT;

const RULES = 'What number is missing in the progression?';

function generateProgression($startItem, $step, $itemsCount): array 
{
    $prog = [];
    $index = 0;
    while ($index < $itemsCount) {
        $prog[] = $startItem;
	$startItem += $step;
        $index++;
    }
    return $prog;
}

function makeKeyNumber($array, $keyIndex): int
{
    $keyNumber = $array[$keyIndex];
    return $keyNumber;
}

function prepareProgression($array, $keyIndex): array
{
    $temp = $array;
    $temp[$keyIndex] = '..';
    return $temp;
}

function isCorrect(string $answer, $array, $keyIndex): bool
{
    if ($answer ===  makeKeyNumber($array, $keyIndex)) {
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
            $startItem = rand(1, 100);
            $itemsCount = 10;
            $step = rand(1, 10);
            $keyIndex = rand(0, 9);
            $progression = generateProgression($startItem, $step, $itemsCount); 
            $correctAnswer = strval(makeKeyNumber($progression, $keyIndex));
            $question = implode(' ', prepareProgression($progression, $keyIndex));
            $gameData[] = [$question, $correctAnswer];
            $userAttempts++;
        }
        startGame(RULES, $gameData);
}

