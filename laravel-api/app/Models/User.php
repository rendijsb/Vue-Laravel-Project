<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const NAME = 'name';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const REMEMBER_TOKEN = 'remember_token';
    const EMAIL_VERIFIED_AT = 'email_verified_at';

    protected $fillable = [
        self::NAME,
        self::EMAIL,
        self::PASSWORD,
    ];

    protected $hidden = [
        self::PASSWORD,
        self::REMEMBER_TOKEN,
    ];

    protected function casts(): array
    {
        return [
            self::EMAIL_VERIFIED_AT => 'datetime',
            self::PASSWORD => 'hashed',
        ];
    }

    public function relatedListings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }

    public function getSentMessages(): HasMany
    {
        return $this->hasMany(Message::class, Message::SENDER_ID);
    }

    public function getReceivedMessages(): HasMany
    {
        return $this->hasMany(Message::class, Message::RECIEVER_ID);
    }
}
