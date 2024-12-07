<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array<int, string>
     */
    protected $table = 'myuser';
    protected $fillable = [
        'name', // Garder uniquement 'name' et 'password'
        'password',
        'role',
    ];

    /**
     * Les attributs qui doivent être cachés lors de la sérialisation.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les attributs qui doivent être castés.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // Il n'est plus nécessaire d'avoir 'email_verified_at' car l'email est supprimé
    ];

    /**
     * Spécifier que l'authentification doit utiliser le champ 'name'.
     *
     * @var string
     */
    public $username = 'name';  // Cela permet d'utiliser 'name' pour l'authentification
}
