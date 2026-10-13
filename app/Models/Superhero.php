<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superhero extends Model
{
    use HasFactory;

    protected $table = 'superheroes';

    protected $fillable = [
        'real_name',
        'hero_name',
        'picture',
        'additional_info',
    ];
}
