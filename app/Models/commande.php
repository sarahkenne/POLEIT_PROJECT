<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class commande extends Model
{
    use HasFactory;
    protected $fillable = ['payment_intent_id', 'montant', 'user_id', 'articles'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
