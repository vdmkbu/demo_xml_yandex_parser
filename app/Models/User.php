<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected const ROLE_ADMIN = 'admin';
    protected const ROLE_USER = 'user';

    protected const STATUS_ACTIVE = 'active';
    protected const STATUS_DISABLED = 'disabled';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function isDisabled(): bool
    {
        return !$this->active;
    }
    public static function rolesList(): array
    {
        return [self::ROLE_ADMIN, self::ROLE_USER];
    }

    public static function statusesList(): array
    {
        return [
            1 => self::STATUS_ACTIVE,
            0 => self::STATUS_DISABLED
        ];
    }
}
