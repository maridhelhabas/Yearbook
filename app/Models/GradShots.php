<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradShots extends Model
{
    use HasFactory;

    protected $fillable = [
        'gradshot_id',
        'grad_image',
    ];
}