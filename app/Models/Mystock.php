<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mystock extends Model
{
    use HasFactory;
    protected $table = 'mystocks';
    protected $fillable = ["idStock", "QteStock", "DateMotif","TransFApp"];
}
