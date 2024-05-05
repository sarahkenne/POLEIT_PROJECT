<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tag;
use App\Models\categorie;
use App\Models\user;

class articleblog extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'contenu',
        'tags_id',
    ];

    public function tags() {
        return $this->belongsTo(tag::class, 'tags_id');
    }
    public function categories() {
        return $this->belongsTo(categorie::class, 'categories_id');
    }
    public function users() {
        return $this->belongsTo(user::class, 'users_id');
    }
}
