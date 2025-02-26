<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $attributes = [
        'contact_type' => 1
    ];

    protected $fillable = [
        'contact_type',
        'name',
        'email',
        'contact_number',
        'address',
        'subject',
        'message',
    ];

    public function getContactTypeAttribute($attribute){
        return $attribute ?? $this->attributes['contact_type'];
    }

    public function contactTypeOptions(): array
    {
        return [
            1 => 'General contact',
            2 => 'Products and services',
        ];
    }
}
