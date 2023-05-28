<?php

namespace src\modules\calc;

use function src\modules\Engine\startGame;
use const src\modules\Engine\ATTEMPT_COUNT;

const RULES = 'What is the result of the expression?';

function calculate($number1, $number2, $sign) {
    switch($sign) {
	case '+':
	    return $number1 + $number2;
	    break;
	case '-':
	    return $number1 - $number2;
	    break;
	case '*':
	    return $number1 * $number2;
	    break;
    }
}

function isCorrect(string $answer, int $number1, $number2, $sign): bool {
    if ($answer == calculate($number1, $number2, $sign)) {
        return true;
    } else {
	return false;								            }
    }

function choiceSign() {
    $signs = ['+', '-', '*'];
    $sign = $signs[rand(0, 2)];
    return $sign;
}

function run() {
    $gameData = [];
    $userAttempts = 0;
    while ($userAttempts < ATTEMPT_COUNT) {
	$number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $sign = choiceSign();
	$correctAnswer = calculate($number1, $number2, $sign);
	$question = "$number1  $sign  $number2";
	$gameData[] = [$question, $correctAnswer];
	$userAttempts++;
    }
    startGame(RULES, $gameData);
}

