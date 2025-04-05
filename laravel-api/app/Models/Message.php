<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    const BODY = 'body';
    const IS_READ = 'is_read';
    const SENDER_ID = 'sender_id';
    const RECIEVER_ID = 'reciever_id';
    const LISTING_ID = 'listing_id';

    protected $fillable = [
        self::BODY,
        self::IS_READ,
        self::SENDER_ID,
        self::RECIEVER_ID,
        self::LISTING_ID,
    ];

    public function relatedSender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function relatedReceiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function relatedListing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }

    public function getBody(): string
    {
        return $this->getAttribute(self::BODY);
    }

    public function getIsRead(): bool
    {
        return $this->getAttribute(self::IS_READ);
    }

    public function getSenderId(): int
    {
        return $this->getAttribute(self::SENDER_ID);
    }

    public function getRecieverId(): int
    {
        return $this->getAttribute(self::RECIEVER_ID);
    }

    public function getListingId(): int
    {
        return $this->getAttribute(self::LISTING_ID);
    }
}
