<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Games\Engine\startGame;

use const BrainGames\Games\Engine\ATTEMPT_COUNT;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number): string
{
    $primeNumbers = [2, 3, 5, 7, 11 ,13, 17, 19, 23, 29,
        31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73,
        79, 83, 89, 97];
    $resalt = 'no';
    for ($i = 0; $i < count($primeNumbers); $i++) {
        if ($number == $primeNumbers[$i]) {
            $resalt = 'yes';
        }
    }
    return $resalt;
}

function run()
{
    $gameData = [];
    $userAttempts = 0;
    while ($userAttempts < ATTEMPT_COUNT) {
        $number = rand(2, 100);
        $correctAnswer = isPrime($number);
        $question = "$number";
        $gameData[] = [$question, $correctAnswer];
        $userAttempts++;
    }
    startGame(RULES, $gameData);
}
