<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'pacakge_name',
        'pacakge_description',
        'pacakge_price',
        'pacakge_valid',
    ];
}
