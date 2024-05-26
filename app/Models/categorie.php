<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\articleblog;

class categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'intitule',
        'description',
    ];
    public function blog()
    {
        return $this->hasMany(articleblog::class, 'tags_id');
    }
}
