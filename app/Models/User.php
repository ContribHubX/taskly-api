<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Attributes\HasDefaultConcreteFields;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Task;

class User extends Authenticatable implements CanResetPassword
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens, HasDefaultConcreteFields, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        self::NAME,
        self::EMAIL,
        self::PASSWORD,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        self::PASSWORD,
        self::REMEMBER_TOKEN,
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            self::PASSWORD => 'hashed',
        ];
    }

    public const TABLE_NAME = "users";

    public const NAME = "name";
    public const EMAIL = "email";
    public const PASSWORD = "password";
    public const REMEMBER_TOKEN = "remember_token";


    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
