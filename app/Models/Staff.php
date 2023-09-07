<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

        protected $fillable = [
        'user_image',
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'password',
        'role'
        
    ];


    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    public function isAdmin()
    {
        return $this->role === 'Administrator';
    }

    public function isStaff()
    {
        return $this->role === 'Staff';
    }

    public function isAlumnus()
    {
        return $this->role === 'Alumnus';
    }
//     public function hasRole($role)
// {
//     $roles = explode(',', $this->roles);
//     return in_array($role, $roles);
// }
}
