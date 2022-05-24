<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use lluminate\Models\Manufacturer;

class ManufacturerController extends Controller
{
    public function store()
    {
        $manuData = {
            'name' => $request->name,
            'id' => $id,

        };
    }
}
