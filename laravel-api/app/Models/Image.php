<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;

    const PATH = 'path';
    const IS_PRIMARY = 'is_primary';
    const LISTING_ID = 'listing_id';

    protected $fillable = [
        self::PATH,
        self::IS_PRIMARY,
        self::LISTING_ID,
    ];

    public function relatedListing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }

    public function getPath(): string
    {
        return $this->getAttribute(self::PATH);
    }

    public function isPrimary(): bool
    {
        return $this->getAttribute(self::IS_PRIMARY);
    }

    public function getListingId(): int
    {
        return $this->getAttribute(self::LISTING_ID);
    }
}
