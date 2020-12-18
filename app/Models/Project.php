<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected const STATUS_ACTIVE = 'active';
    protected const STATUS_DISABLED = 'disabled';

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

    public static function statusesList(): array
    {
        return [
            1 => self::STATUS_ACTIVE,
            0 => self::STATUS_DISABLED
        ];
    }
}
