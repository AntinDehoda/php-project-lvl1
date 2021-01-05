<?php

namespace php\project\lvl1\EvenGame;

use function cli\line;
use function cli\prompt;
use function rand;

function run()
{
    $minNumber = 1;
    $maxNumber = 10000;
    $counter = 0;
    $winCounter = 3;
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line('Answer "yes" if the number is even, otherwise answer "no"');
    while ($counter < $winCounter) {
        $number = rand($minNumber, $maxNumber);
        line('Question: %s', $number);
        $answer = prompt('Your answer');
        $rightAnswer = $number % 2 === 0 ? 'yes' : 'no';

        if ($answer === $rightAnswer) {
            line('Correct');
            $counter++;
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'', $answer, $rightAnswer);
            $counter = 0;
        }
    }

    line('Congratulations, %s!', $name);
}
//end run()
