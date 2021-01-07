<?php

namespace php\project\lvl1\Games;

use function cli\line;
use function cli\prompt;

class CalcGame implements Game
{
    private array $operators = ['+', '-', '*'];

    public function playGame(): bool
    {
        $number01 = rand(self::MIN_RANDOM, self::MAX_RANDOM);
        $number02 = rand(self::MIN_RANDOM, self::MAX_RANDOM);
        $operator = $this->getRandomOperator();

        line('Question: %s', $number01 . ' ' . $operator . ' ' . $number02);
        $answer = prompt('Your answer');
        $rightAnswer = $this->getResult($number01, $number02, $operator);

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
        return 'What is the result of the expression?';
    }
    private function getRandomOperator(): string
    {
        $randomIndex = rand(0, count($this->operators) - 1);
        return $this->operators[$randomIndex];
    }

    private function getResult(int $num01, int $num02, string $operator): int
    {
        $result = 0;
        switch ($operator) {
            case '+':
                $result = $num01 + $num02;
                break;
            case '-':
                $result = $num01 - $num02;
                break;
            case '*':
                $result = $num01 * $num02;
                break;
        }
        return $result;
    }
}
