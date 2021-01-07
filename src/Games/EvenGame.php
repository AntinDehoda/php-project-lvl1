<?php

namespace php\project\lvl1\Games;

use function cli\line;
use function cli\prompt;

class EvenGame implements Game
{

    public function playGame(): bool
    {
        $number = rand(self::MIN_RANDOM, self::MAX_RANDOM);
        line('Question: %s', $number);
        $answer = prompt('Your answer');
        $rightAnswer = $number % 2 === 0 ? 'yes' : 'no';

        if ($answer === $rightAnswer) {
            line('Correct');
            return true;
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'', $answer, $rightAnswer);
            return false;
        }
    }

    public function getFirstQuestion(): string
    {
        return 'Answer "yes" if the number is even, otherwise answer "no"';
    }
}
