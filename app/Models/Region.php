<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['region'];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
