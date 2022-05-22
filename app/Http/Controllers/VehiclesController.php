<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $vehData = [
            'make' => $request->make,
            'model_name' => $request->model_name,
            'version' => $request->version,
            'powertrain' => $request->powertrain,
            'trans' => $request->trans,
            'fuel' => $request->fuel,
            'model_year' => $request->model_year,
            'image' => $filename
        ];
        Vehicle::create($vehData);
        return response()->json([
            'status' => 200,
        ]);
    }

    // FETCH ALL AJAX REQUEST

    public function fetchAll()
    {
        $vehicles = Vehicle::all(); //Could be model or controller...
        // <th class="tbl-head">ID</th>
        // <td>'.$vehicle->id.'</td>
        $output = '';
        if ($vehicles->count() > 0) {
            $output .= '<table #"showAll" class="veh-table table table-striped table-sm text-center align-middle" >
                <thead>
                    <tr>

                        <th class="tbl-head">Image</th>
                        <th class="tbl-head">Make</th>
                        <th class="tbl-head">Model</th>
                        <th class="tbl-head">Derivative</th>
                        <th class="tbl-head">Powertrain</th>
                        <th class="tbl-head">Transmission</th>
                        <th class="tbl-head">Fuel Type</th>
                        <th class="tbl-head">Model Year</th>
                    </tr>
                </thead>
                <tbody>';
            foreach ($vehicles as $vehicle) {
                $output .= '<tr class="tbl exp_tbl">

                    <td><img src="./storage/images/'.$vehicle->image.'"  class="img-thumbnail justify-content-sm-center"></td>
                    <td>'.$vehicle->make.'</td>
                    <td>'.$vehicle->model_name.'</td>
                    <td>'.$vehicle->version.'</td>
                    <td>'.$vehicle->powertrain.'</td>
                    <td>'.$vehicle->trans.'</td>
                    <td>'.$vehicle->fuel.'</td>
                    <td>'.$vehicle->model_year.'</td>
                    <td>
                        <a href="/edit" id="' . $vehicle->id . '" class="text-success mx-2 editIcon" data-bs-toggle="modal" data-bs-target="#editVehicleModal"><i class="bi-pencil-square h4"></i></a>

                        <a href="#" id="' . $vehicle->id .'" class="text-danger mx-1 delete-icon"><i class-"bi-trash h4"></i></a>
                    </td>
                </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No vehicles in the database!</h1>';
        }
    }

    public function time($time)
    {
        $time->Carbon::now();
    }
}
