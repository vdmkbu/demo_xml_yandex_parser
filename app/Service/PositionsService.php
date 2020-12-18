<?php


namespace App\Service;


use Illuminate\Support\Facades\DB;

class PositionsService
{
    public function create(array $positions)
    {
        DB::table('positions')->insert($positions);
    }
}
