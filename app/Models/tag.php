<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
    ];    
    
    public function articles()

    {
        return $this->hasMany(article_blog::class);
    }
    
}
