<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mydefprix extends Model
{
    use HasFactory;
    protected $table = 'myrecap';
    protected $fillable = ["CodePdt", "PvteUnit", "CodeCateg",];

}
