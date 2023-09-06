<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class yearbooks extends Model
{
    use HasFactory;
       protected $fillable = ['profile','firstname',
    'lastname','phone_number','email_address','password'
    ];
}
