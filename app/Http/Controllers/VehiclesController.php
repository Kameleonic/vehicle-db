<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Facades\Storage;
use App\Models\Vehicle;
use Illuminate\Http\Controllers;
use Illuminate\Database\Migrations\CreateVehiclesTable;

class VehiclesController extends Controller
{
    public function index()
    {
        return view('index');
    }

    /**
     *  -----------------
     *  Vehicle Functions
     *  -----------------
     * store, edit, delete,
     * fetchall, etc...
     *
     * $request - Request data from a database.
     * $vehData - Data generated from user to be stored.
     */

    public function store(Request $request)
    {
        // print_r($_POST);
        // print_r($_FILES);
        // // }


        $file = $request->file('image');
        $filename = time(). '.' .$file->getClientOriginalExtension();
        $file->storeAs('public/images', $filename);



        // INSERT VEHICLE AJEX REQUEST
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
        return response()->json(
            ['status' => 200,]
        );
    }

    // FETCH ALL AJAX REQUEST
    public function fetchAll()
    {
        $vehicles = Vehicle::all(); //Could be model or controller...

        $output = '';
        if ($vehicles->count() > 0) {
            $output .= '<table #"showAll" class="veh-table table table-striped table-sm text-center align-middle" >
                <thead>
                    <tr>
                        <th class="tbl-head">ID</th>
                        <th class="tbl-head">Image</th>
                        <th class="tbl-head">Make</th>
                        <th class="tbl-head">Model</th>
                        <th class="tbl-head">Derivative</th>
                        <th class="tbl-head">Powertrain</th>
                        <th class="tbl-head">Transmission</th>
                        <th class="tbl-head">Fuel Type</th>
                        <th class="tbl-head">Model Year</th>
                        <th class="tbl-head"><i class="bi-gear-fill h5"></i></th>
                    </tr>
                </thead>
                <tbody>';
            foreach ($vehicles as $vehicle) {
                $output .= '<tr class="tbl exp_tbl">
                    <td>'.$vehicle->id.'</td>
                    <td><img src="./storage/images/'.$vehicle->image.'"  class="img-thumbnail justify-content-sm-center"></td>
                    <td>'.$vehicle->make.'</td>
                    <td>'.$vehicle->model_name.'</td>
                    <td>'.$vehicle->version.'</td>
                    <td>'.$vehicle->powertrain.'</td>
                    <td>'.$vehicle->trans.'</td>
                    <td>'.$vehicle->fuel.'</td>
                    <td>'.$vehicle->model_year.'</td>
                    <td>
                        <a href="/edit" id="' . $vehicle->id . '" class="text-success mx-2 editIcon" data-bs-toggle="modal" data-bs-target="#editVehicleModal"><i class="bi-pencil-square h6"></i></a>

                        <a href="#" id="' . $vehicle->id .'" class="text-danger mx-1 delete-icon"><i class="bi-trash h6"></i></a>
                    </td>
                </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No vehicles in the database!</h1>';
        }
    }

    // HANDLE EDIT REQUEST FOR VEHICLES
    public function edit(Request $request)
    {
        $id = $request->id;
        $veh = Vehicle::find($id);
        return response()->json($veh);
    }

    // UPDATE VEHICLE
    public function update(Request $request)
    {
        $fileName = '';
        $veh = Vehicle::findOrFail($request->id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            if ($veh->image) {
                Storage::delete('public/images/' . $veh->image);
            }
        } else {
            $fileName = $request->image;
        }
        $vehData = [
            'id' => $request->id,
            'make' => $request->make,
            'model_name' => $request->model_name,
            'version' => $request->version,
            'powertrain' => $request->powertrain,
            'trans' => $request->trans,
            'fuel' => $request->make,
            'model_year' => $request->model_year,
            'image' => $request->image
        ];
        $veh->update($vehData);
        return response()->json('status');
    }

    public function time($time)
    {
        $time->Carbon::now();
    }
}
