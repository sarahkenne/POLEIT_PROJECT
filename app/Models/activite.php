<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class activite extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'users_id',
        'lieu',
        'date_debut',
        'date_fin',
        'type',
        'cout',
        'image',
        'statut',

    ];
    public function users(){
        return $this->belongsTo(User::class ,'users_id','id');
    }
    public function inscriptions(){
        return $this->hasMany(inscriptionActivite::class);
    }

}
