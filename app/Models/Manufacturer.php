<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    public function getLogoUrlAttribute()
    {
        return Storage::url("logs/$this->manu_logo.png");
    }
}
