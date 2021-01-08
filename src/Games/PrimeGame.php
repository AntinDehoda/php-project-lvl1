<?php

namespace php\project\lvl1\Games;

use function cli\line;
use function cli\prompt;

class PrimeGame implements Game
{

    public function playGame(): bool
    {
        $number = rand(self::MIN_RANDOM, self::MAX_RANDOM);
        line('Question: %s', $number);
        $answer = prompt('Your answer');
        $rightAnswer = $this->isPrime($number) ? 'yes' : 'no';

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
        return 'Answer "yes" if given number is prime. Otherwise answer "no"';
    }

    private function isPrime(int $num): bool
    {
        if ($num == 2) {
            return true;
        }
        if ($num % 2 == 0 || $num == 1) {
            return false;
        }
        for ($i = 3; $i < floor($num / 2); $i += 2) {
            if ($num % $i == 0) {
                return false;
            }
        }
        return true;
    }
}
