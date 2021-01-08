<?php

namespace php\project\lvl1\Games;

use function cli\line;
use function cli\prompt;

class ProgressionGame implements Game
{
    public const MIN_LENGTH = 5;
    public const MAX_LENGTH = 10;
    public const MIN_DIFF = 1;
    public const MAX_DIFF = 10;

    public function playGame(): bool
    {
        $length = rand(self::MIN_LENGTH, self::MAX_LENGTH);
        $element = rand(self::MIN_RANDOM, self::MAX_RANDOM);
        $diff = rand(self::MIN_DIFF, self::MAX_DIFF);
        $hiddenNumberIndex = rand(0, $length - 1);
        $rightAnswer = '';
        $arrayString = '' . $element;
        for ($i = 0; $i < $length; $i++) {
            $element += $diff;
            if ($i == $hiddenNumberIndex) {
                $arrayString .= ' ..';
                $rightAnswer = $element;
            } else {
                $arrayString .= ' ' . $element;
            }
        }

        line('Question: %s', $arrayString);
        $answer = prompt('Your answer');

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
        return 'What number is missing in the progression?';
    }
}
