<?php


namespace App\Commands;


use Illuminate\Support\Facades\DB;

class ResetProjectState
{
    public function __invoke()
    {
        DB::table('projects')->update(['state' => 0]);
    }
}
