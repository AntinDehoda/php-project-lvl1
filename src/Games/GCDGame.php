<?php

namespace php\project\lvl1\Games;

use function cli\line;
use function cli\prompt;

class GCDGame implements Game
{

    public function playGame(): bool
    {
        $number01 = rand(self::MIN_RANDOM, self::MAX_RANDOM);
        $number02 = rand(self::MIN_RANDOM, self::MAX_RANDOM);

        line('Question: %s', $number01 . ' ' . $number02);
        $answer = prompt('Your answer');
        $rightAnswer = $this->getResult($number01, $number02);

        if ($answer == $rightAnswer) {
            line('Correct');
            return true;
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'', $answer, $rightAnswer);
            return false;
        }
    }

    public function getFirstQuestion(): string
    {
        return 'Find the greatest common divisor of given numbers.';
    }

    private function getResult(int $num01, int $num02): int
    {
        while ($num01 !== $num02) {
            if ($num01 > $num02) {
                $num01 = $num01 - $num02;
            } else {
                $num02 = $num02 - $num01;
            }
        }

        return $num01;
    }
}
