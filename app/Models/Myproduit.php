<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myproduit extends Model
{
    use HasFactory;
    protected $table = 'myproduit';
    protected $fillable = ["CodePdt", "DesignPdt", "QteStockAlerte", "QteStockSec", "DateMotif", "CodeFournis", "PvteCas", "TypePdt", "PdtTVA"];

}
