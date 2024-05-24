<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\article;

class categorieproduit extends Model
{
    use HasFactory;
    protected $fillable = [
        'intitule',
        'description',
    ];
    public function articles()
    {
        return $this->hasMany(article::class, 'categorieproduits_id');
    }
}
