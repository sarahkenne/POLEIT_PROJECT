<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inscription_activite extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'activite_id',
    ];

    public function activite()
    {
        return $this->belongsTo(Activite::class, 'activite_id');
    }

}
