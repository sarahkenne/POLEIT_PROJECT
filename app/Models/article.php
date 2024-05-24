<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\categorieproduit;
use App\Models\quandite;

class article extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'details', 'image', 'categorieproduits_id', 'prix', 'users_id'];

    public function getPrice()
    {
        $prix = $this->prix / 100;

        return number_format($prix, 2, ',', ' ') . ' €';
    }
    public function categories() {
        return $this->belongsTo(categorieproduit::class, 'categorieproduits_id');
    }
    public function users() {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function quantites() {
        return $this->hasMany(quandite::class, 'articles_id');
    }
    

}
