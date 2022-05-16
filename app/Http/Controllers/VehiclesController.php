<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Http\Controllers;
use Illuminate\Database\Migrations\CreateVehiclesTable;

class VehiclesController extends Controller
{
    public function index()
    {
        return view('index');
    }

    /** Handle insert */

    public function store(Request $request)
    {
        // print_r($_POST);
        // print_r($_FILES);
        // // }


        $file = $request->file('image');
        $filename = time(). '.' .$file->getClientOriginalExtension();
        $file->storeAs('public/images', $filename);



        // handle insert vehicle ajax request
        $vehicle = Vehicle::create(
            [
            'make' => $request->make,
            'model_name' => $request->model_name,
            'version' => $request->version,
            'powertrain' => $request->powertrain,
            'fuel' => $request->fuel,
            'model_year' => $request->model_year,
            'image' => $filename
            ]
        );

        return response()->json($vehicle);
    }

    // FETCH ALL AJAX REQUEST

    public function fetchAll()
    {
        $vehicles = Vehicle::all(); //Could be model or controller...
        $output = '';
        if ($vehicles->count() > 0) {
            $output .= '<table class="table table-striped table-sm text-center align-middle" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Derivative</th>
                        <th>Fuel Type</th>
                        <th>Model Year</th>
                    </tr>
                </thead>
                <tbody>';
            foreach ($vehicles as $vehicle) {
                $output .= '<tr>
                    <td>'.$vehicle->id.'</td>
                    <td><img src="./storage/images/'.$vehicle->image.'" width="50" class="img-thumbnail rounded-circle"></td>
                    <td>'.$vehicle->make.'</td>
                    <td>'.$vehicle->model_name.'</td>
                    <td>'.$vehicle->version.'</td>
                    <td>'.$vehicle->fuel.'</td>
                    <td>'.$vehicle->model_year.'</td>
                    <td>
                        <a href="#" id="'.$vehicle->id.'" class="text-success mx-2 editIcon" data-bs-toggle="modal" data-bs-target="editVehicleModal"><i class="bi-pencil-square h4"></i></a>

                        <a href="#" id="'.$vehicle->id.'" class="text-danger mx-1 delete-icon"><i class-"bi-trash h4"></i></a>
                    </td>
                </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No vehicles in the database!</h1>';
        }
    }
}
