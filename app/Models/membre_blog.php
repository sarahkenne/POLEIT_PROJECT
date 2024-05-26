<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class membre_blog extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'tag_id',
        'categorie_blog_id',
        'users_blog_id',
        'titre',
        'contenu',
        'image',
        'visiblite',
    ];
    
    public function activites()
    {
        return $this->hasMany(Activite::class);
    }
    
    public function activite()
{
    return $this->hasOne(Activite::class);
}


    
}
