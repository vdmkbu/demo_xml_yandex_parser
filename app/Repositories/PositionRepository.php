<?php


namespace App\Repositories;


use App\Models\Position;
use Illuminate\Support\Facades\DB;

class PositionRepository
{
    public function getGroupedRegionsByDate(string $date, int $project_id)
    {
        return Position::with(['region'])
            ->select('region_id')
            ->where('project_id', $project_id)
            ->where('created_at', 'LIKE', $date . '%')
            ->groupBy('region_id')
            ->get();
    }

    public function getGroupedPositionsByDate(string $date, int $project_id)
    {
        return Position::with(['word'])
            ->select('word_id', DB::raw('GROUP_CONCAT(pos) as positions'))
            ->where('project_id', $project_id)
            ->where('created_at', 'LIKE', $date . '%')
            ->groupBy('word_id')
            ->get();
    }

    public function getGroupedRegions(int $project_id)
    {
        return Position::with(['region'])
            ->select('region_id')
            ->where('project_id', $project_id)
            ->groupBy('region_id')
            ->get();
    }

    public function getGroupedWords(int $project_id)
    {
        return Position::with(['word'])
            ->select('word_id')
            ->where('project_id', $project_id)
            ->groupBy('word_id')
            ->get();
    }

    public function getPosition(int $project_id, int $region_id, int $word_id, string $date)
    {
        return DB::table('positions')->where('project_id', $project_id)
            ->where('region_id', $region_id)
            ->where('word_id', $word_id)
            ->where('created_at', 'LIKE', $date . '%')
            ->first();
    }
}
