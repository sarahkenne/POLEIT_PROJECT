<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_blog extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'role_id',
        'nom',
        'mot_de_passe',
        'email',
        'avatar',
        'role',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
