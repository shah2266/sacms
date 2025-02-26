<?php

namespace App\Traits;

trait HasStatus
{

    public function getStatusAttribute($attribute):string
    {
        return $attribute ?? $this->attributes['status'];
    }

    public function statusOptions(): array
    {
        return [
            0 => 'Inactive',
            1 => 'Active'
        ];
    }
}