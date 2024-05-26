<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\activite;
use App\Models\inscriptionActivite;
use App\Models\articleblog;
use App\Models\article;
use App\Models\commande;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function activites()
    {
        return $this->hasMany(activite::class, 'users_id');
    }
    public function inscriptions()
    {
        return $this->hasMany(inscriptionActivite::class, 'users_id');
    }
    public function blogs()
    {
        return $this->hasMany(articleblog::class, 'users_id');
    }
    public function articles()
    {
        return $this->hasMany(article::class, 'users_id');
    }
   
    public function commandes()
    {
        return $this->hasMany(commande::class, 'users_id');
    }
}
