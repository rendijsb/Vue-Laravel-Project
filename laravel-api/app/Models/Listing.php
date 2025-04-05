<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Listing extends Model
{
    use HasFactory;

    const TITLE = 'title';
    const DESCRIPTION = 'description';
    const PRICE = 'price';
    const LOCATION = 'location';
    const CONDITION = 'condition';
    const IS_PUBLISHED = 'is_published';
    const IS_PROMOTED = 'is_promoted';
    const USER_ID = 'user_id';
    const CATEGORY_ID = 'category_id';

    protected $fillable = [
        self::TITLE,
        self::DESCRIPTION,
        self::PRICE,
        self::LOCATION,
        self::CONDITION,
        self::IS_PUBLISHED,
        self::IS_PROMOTED,
        self::USER_ID,
        self::CATEGORY_ID,
    ];

    public function relatedUser(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function relatedCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function relatedImages(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function relatedMessages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function getName(): string
    {
        return $this->getAttribute(self::TITLE);
    }

    public function getDescription(): string
    {
        return $this->getAttribute(self::DESCRIPTION);
    }

    public function getPrice(): string
    {
        return $this->getAttribute(self::PRICE);
    }

    public function getLocation(): string
    {
        return $this->getAttribute(self::LOCATION);
    }

    public function getCondition(): string
    {
        return $this->getAttribute(self::CONDITION);
    }

    public function getIsPublished(): bool
    {
        return $this->getAttribute(self::IS_PUBLISHED);
    }

    public function getIsPromoted(): bool
    {
        return $this->getAttribute(self::IS_PROMOTED);
    }

    public function getUserId(): int
    {
        return $this->getAttribute(self::USER_ID);
    }

    public function getCategoryId(): int
    {
        return $this->getAttribute(self::CATEGORY_ID);
    }
}
