<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inscriptionActivite extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'activites_id',
        'statut',
    ];
    public function users(){
        return $this->belongsTo(User::class ,'users_id','id');
    }
    public function activites(){
        return $this->belongsTo(activite::class ,'activites_id','id');
    }
}
