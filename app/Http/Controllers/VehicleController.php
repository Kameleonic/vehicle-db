<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        return view('index');
    }

    // Handle insert

    public function store(Request $request)
    {
        print_r($_POST);
        print_r($_FILES);
        // }


        // $file = $request->file('image');
        // $filename = time(). '.' .$file->getClientOriginalExtension();
        // $file->storeAs('public/images', $filename);


        // // handle insert vehicle ajax request
        // $vehData = [
        //     'make' => $request->make,
        //     'model_name' => $request->model_name,
        //     'version' => $request->version,
        //     'powertrain' => $request->powertrain,
        //     'fuel' => $request->fuel,
        //     'model_year' => $request->model_year,
        //     'image' => $filename
        // ];
    }
};
