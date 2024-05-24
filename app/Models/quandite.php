<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\article;

class quandite extends Model
{
    use HasFactory;
    protected $fillable = ['articles_id', 'quandite'];
    public function articles() {
        return $this->belongsTo(article::class, 'articles_id');
    }

}
