<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'file_name', 'image', 'width', 'height', 'content', 'order', 'is_active'];

    protected $casts = [
        'content' => 'array', // Automatically converts JSON to an array
    ];

    public static function getActiveTemplate()
    {
        return self::where('is_active', true)->first();
    }
}
