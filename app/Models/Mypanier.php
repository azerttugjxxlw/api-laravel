<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mypanier extends Model
{
    use HasFactory;
    protected $table = 'mypaniers';
    protected $fillable = ["idPanier", "Client", "NomProduit", "CategProd", "PrixUnitaire", "QteProduit","PrixTotal","Date"];
}
