<?php


namespace App\Commands;


use App\Service\Checker;

class CheckPositionsCommand
{
    public function __invoke(Checker $checker)
    {
        $checker->check();
    }
}
