<?php

namespace php\project\lvl1\Cli;

use function cli\line;
use function cli\prompt;

function run()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
}
//end run()
