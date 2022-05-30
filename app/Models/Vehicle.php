<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicles';
    protected $fillable = [
        'id',
        'make',
        'model_name',
        'version',
        'powertrain',
        'trans',
        'fuel',
        'model_year',
        'image'

    ];
}
