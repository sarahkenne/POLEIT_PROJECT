<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activite extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'date_debut',
        'date_fin',
        'type',
        'lieu',
        'statut',
        'cout',
    ];

    protected $casts = [
        'date_debut' => 'datetime',
        'date_fin' => 'datetime',
        'statut' => 'boolean',
    ];

    protected $attributes = [
        'statut' => true,
    ];

    public function inscriptions()
{
    return $this->hasMany(Inscription_Activite::class);
}

public function membreBlog()
{
    return $this->belongsTo(Membre_Blog::class);
}


    
}
