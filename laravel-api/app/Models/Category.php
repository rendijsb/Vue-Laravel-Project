<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    const NAME = 'name';
    const SLUG = 'slug';
    const DESCRIPTION = 'description';
    const ICON = 'icon';
    const PARENT_ID = 'parent_id';

    protected $fillable = [
        self::NAME,
        self::SLUG,
        self::DESCRIPTION,
        self::ICON,
        self::PARENT_ID,
    ];

    public function relatedParent(): BelongsTo
    {
        return $this->belongsTo(Category::class, self::PARENT_ID);
    }

    public function relatedChildren(): HasMany
    {
        return $this->hasMany(Category::class, self::PARENT_ID);
    }

    public function relatedListings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }

    public function getName(): string
    {
        return $this->getAttribute(self::NAME);
    }

    public function getSlug(): string
    {
        return $this->getAttribute(self::SLUG);
    }

    public function getDescription(): string
    {
        return $this->getAttribute(self::DESCRIPTION);
    }

    public function getIcon(): string
    {
        return $this->getAttribute(self::ICON);
    }

    public function getParentId(): int
    {
        return $this->getAttribute(self::PARENT_ID);
    }
}
