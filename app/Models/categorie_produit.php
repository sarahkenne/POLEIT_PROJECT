<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie_produit extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'intitule',
        'description',
    ];
}
