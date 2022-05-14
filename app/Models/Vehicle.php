<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory; /**  Name of columns fillable */
    public $timestamps = false;
    protected $table = 'tbl_vehicles';
    protected $fillable = [
        'make',
        'model_name',
        'version',
        'powertrain',
        'fuel',
        'model_year',
        'image',
        'created_at'

    ];
};
