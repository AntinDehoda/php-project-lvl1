<?php

namespace php\project\lvl1;

use php\project\lvl1\Games\Game;

use function cli\line;
use function cli\prompt;

class Engine
{
    public const ROUNDS = 3;

    public function run(Game $game)
    {
        $counter = 0;
        line('Welcome to the Brain Games!');
        $name = prompt('May I have your name?');
        line('Hello, %s!', $name);
        line($game->getFirstQuestion());
        while ($counter < self::ROUNDS && $game->playGame()) {
            $counter++;
        }
        $msg = $counter == self::ROUNDS ? 'Congratulations, %s!' : 'Let\'s try again, %s!';
        line($msg, $name);
    }
}
