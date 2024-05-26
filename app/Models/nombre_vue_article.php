<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nombre_vue_article extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_blog_id',
        'nombre_de_vue',
        'ip_user',
    ];

    public function articleBlog()
    {
        return $this->belongsTo(Article_Blog::class, 'article_blog_id');
    }
}
