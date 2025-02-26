<?php

namespace App\Traits;

trait HasCategory
{
    public function getCategoryAttribute($attribute):string
    {
        return $attribute ?? $this->attributes['type_id'];
    }

    public function categoryTypes(): array
    {
        return [
            0 => 'Home',
            1 => 'About',
            2 => 'Contact',
            3 => 'Solution',
            4 => 'Partner',
        ];
    }
}
