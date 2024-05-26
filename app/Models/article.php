<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_produit_id',
        'nom',
        'description',
        'prix_initial',
        'image',
        'details',
        'prix_vente',
    ];

    public function categorieProduit()
    {
        return $this->belongsTo(Categorie_Produit::class, 'categorie_produit_id');
    }
}
