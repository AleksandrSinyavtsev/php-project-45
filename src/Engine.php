<?php

namespace BrainGames\Games\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function startGame(string $rules, array $gameData)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($rules);
    foreach ($gameData as [$question, $rightAnswer]) {
        line("Question: %s", $question);
        $answer = prompt("Your answer is");
        if ($answer !== $rightAnswer) {
            line("%s is wrong answer. Correct answer is '%s'.\n
            Let's try again, %s!", $answer, $rightAnswer, $name);
            exit;
        }
        line("Correct!");
    }
    line("Congratulations, %s!", $name);
}
