<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeptMemories extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_id',
        'dept_image',
    ];
}