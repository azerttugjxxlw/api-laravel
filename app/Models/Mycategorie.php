<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mycategorie extends Model
{
    use HasFactory;
    protected $table = 'mycategorie';
    protected $fillable = ["DesignCateg", "LettreCle", "Nb_Bout",];
}
