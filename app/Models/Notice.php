<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    private const DISPLAY_IMAGES = [
        'assets/images/gallery/farmer-cutting-millet.jpg',
        'assets/images/farms/beekeeper-field.jpg',
        'assets/images/products/greens-seasonal.jpg',
        'assets/images/farms/nepali-farmer-baitadi.jpg',
        'assets/images/farms/tea-field.jpg',
        'assets/images/farms/apple-orchard.jpg',
        'assets/images/farms/rice-terraces.jpg',
        'assets/images/gallery/cold-pressed-mustard-oil.jpg',
    ];

    protected $fillable = ['date', 
	'name', 
	'description', 
	'status',
    'is_featured', ];

    protected $casts = [
        'status' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function scopeActiveFeatured(Builder $query): Builder
    {
        return $query->where('status', true)->where('is_featured', true);
    }

    public function getDisplayImageAttribute(): string
    {
        $position = $this->id
            ? max(0, ((int) $this->id) - 1)
            : (int) sprintf('%u', crc32((string) $this->name));

        return self::DISPLAY_IMAGES[$position % count(self::DISPLAY_IMAGES)];
    }

}
