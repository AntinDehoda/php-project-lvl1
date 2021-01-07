<?php

namespace php\project\lvl1\Games;

interface Game
{
    public const MIN_RANDOM = 1;
    public const MAX_RANDOM = 99;

    public function playGame(): bool;
    public function getFirstQuestion(): string;
}
