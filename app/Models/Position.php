<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    public function region()
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }

    public function word()
    {
        return $this->hasOne(Word::class, 'id', 'word_id');
    }
}
