<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory, HasStatus;

    protected $fillable = [
        'template','title', 'slug', 'content', 'seo_title', 'seo_description', 'seo_keywords', 'status'
    ];

    protected $casts = [
        'widgets' => 'array',
        'status' => 'boolean',
    ];

    // Default active value
    protected $attributes = [
        'status' => 1,
    ];

    public function getHeroTypeAttribute($attribute):string
    {
        return $attribute ?? $this->attributes['type'];
    }

    public static function boot() {
        parent::boot();

        static::creating(function ($page) {
            $page->slug = Str::slug($page->title);
        });

        static::updating(function ($page) {
            if(!$page->slug) {
                $page->slug = Str::slug($page->title);
            }
        });
    }
}
