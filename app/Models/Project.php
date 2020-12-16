<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function regions()
    {
        return $this->belongsToMany(Region::class);
    }

    public function words()
    {
        return $this->belongsToMany(Word::class);
    }

    public function isActive(): bool
    {
        return $this->active;
    }
}
