<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myvporte extends Model
{
    use HasFactory;
    protected $table = 'myvportes';
    protected $fillable = ["CodeVporte", "NomPrenom", "ContactVprote","Numpiece","NomPrenomCaution","ContactCaution"];
}
