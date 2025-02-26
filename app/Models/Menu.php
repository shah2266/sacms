<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory, HasStatus;
    protected $fillable = ['name', 'position', 'status'];

    // Default active value
    protected $attributes = [
        'status' => 1,
        'position' => 0,
    ];

    public function getPositionsAttribute($attribute):string
    {
        return $attribute ?? $this->attributes['position'];
    }

    public function items(): HasMany
    {
        return $this->hasMany(MenuItem::class)->whereNull('parent_id')->orderBy('order');
    }

    public function menuPositions(): array
    {
        return [
            0 => 'Header',
            1 => 'Footer',
            2 => 'Others'
        ];
    }
}
