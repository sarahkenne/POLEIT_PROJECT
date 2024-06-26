<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quantite extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'quantite',
        'type',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
