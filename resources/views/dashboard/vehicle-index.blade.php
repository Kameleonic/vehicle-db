/*********************************
* Index Page for Vehicle Database*
* -------------------------------*
* -----------Dashboard-----------*
*/-------------------------------*



<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta name="Pragma" content="no-cache" />
  <meta name="Expires" content="0" />

  <title>Vehicle Dashboard</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
@if ($vehicles->isEmpty())
    <h3 class="text-center text-secondary my-5">No vehicles to populate this table.</h3>
    @else
    <table class="veh-table table table-striped table-sm text-center align-middle" >
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
                <th class="tbl-head">
                    <i class="bi-gear-fill h4">Edit</i>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="tbl exp_tbl">
                <td>{{ $vehicle-id }}</td>
                <td><img src="./storage/images/'.$vehicle->image.'"  class="img-thumbnail justify-content-sm-center"></td>
                <td>{{ $vehicle->make }}</td>
                <td>{{ $vehicle->model_name }}</td>
                <td>{{ $vehicle->version }}</td>
                <td>{{ $vehicle->powertrain }}</td>
                <td>{{ $vehicle->trans }}</td>
                <td>{{ $vehicle->fuel }}</td>
                <td>{{ $vehicle->model_year }}</td>
                <td>
                    <a href="/edit" id="' . $vehicle->id . '" class="text-success mx-2 editIcon" data-bs-toggle="modal" data-bs-target="#editVehicleModal"><i class="bi-pencil-square h6"></i></a>

                    <a href="#" id="' . $vehicle->id .'" class="text-danger mx-1 delete-icon"><i class="bi-trash h6"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
    @endif
</body>
