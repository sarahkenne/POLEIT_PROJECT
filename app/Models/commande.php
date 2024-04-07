<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'total',
        'statut',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
