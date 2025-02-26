<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['file_name', 'image', 'file_type', 'file_size', 'file_path','alt_text', 'width', 'height'];
}
