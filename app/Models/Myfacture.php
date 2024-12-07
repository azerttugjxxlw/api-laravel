<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myfacture extends Model
{
    use HasFactory;
    protected $table = 'myfacturem';
    protected $fillable = ["idFacture", "NumFacture", "NbPdt", "MontFacture", "Date"];
}
