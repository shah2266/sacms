<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hero extends Model
{
    use HasFactory, HasStatus;

    protected $guarded = [];

    // Default active value
    protected $attributes = [
        'status' => 1,
        'type' => 1
    ];

    public function getHeroTypeAttribute($attribute):string
    {
        return $attribute ?? $this->attributes['type'];
    }

    public function heroTypeOptions(): array
    {
        return [
            'banner' => 'Banner',
            'slider' => 'Slider',
        ];
    }

    public function getPageAttribute($attribute):string
    {
        return $attribute ?? $this->attributes['page_id'];
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
