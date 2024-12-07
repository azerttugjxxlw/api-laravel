<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myclient extends Model
{
    use HasFactory;
    protected $table = 'myclient';
    protected $fillable = ["CodeClient", "Rais_Soc", "CintactClient", "AdrClient", "DateEnreg", "TitreRep", "NomRep", "ContactRep", "PrixClient"];

}
