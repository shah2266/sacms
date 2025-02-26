<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, HasStatus;

    protected $guarded = [];

    // Default active value
    protected $attributes = [
        'status' => 1
    ];

}
