<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"
        />
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />


        <title>CRUD Application made using Laravel 8</title>
    </head>
    <body>
        <div class="pos-f-t">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
      <h4 class="text-white">Collapsed content</h4>
      <span class="text-muted">Toggleable via the navbar brand.</span>
    </div>
  </div>
  <nav class="navbar navbar-light bg-primary p-2">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div>
        {{-- add new vehicle modal start --}}
        <div
            class="modal fade"
            id="addVehicleModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            data-bs-backdrop="static"
            aria-hidden="true"
        >
            <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Add New Vehicle
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <form
                        action="#"
                        method="POST"
                        id="add_vehicle_form"
                        enctype="multipart/form-data"
                    >
                        @csrf

                        <div class="modal-body p-4 bg-light">
                            <div class="row">
                                <div class="col-lg">
                                    <label for="make">Make</label>
                                    <input
                                        type="text"
                                        name="make"
                                        class="form-control"
                                        placeholder="Manufacturer..."
                                        required
                                    />
                                </div>
                                <div class="col-lg">
                                    <label for="model_name">Model</label>
                                    <input
                                        type="text"
                                        name="model_name"
                                        class="form-control"
                                        placeholder="Model name..."
                                        required
                                    />
                                </div>
                            </div>
                            <div class="my-2">
                                <label for="version">Version</label>
                                <input
                                    type="text"
                                    name="version"
                                    class="form-control"
                                    placeholder="Model derivative..."
                                    required
                                />
                            </div>
                            <div class="my-2">
                                <label for="fuel">Fuel Type</label>
                                <input
                                    type="text"
                                    name="fuel"
                                    id="fuel"
                                    class="form-control"
                                    placeholder=""
                                    required
                                />
                            </div>
                            <div class="my-2">
                                <label for="powertrain">Powertrain</label>
                                <input
                                    type="text"
                                    name="powertrain"
                                    class="form-control"
                                    placeholder="Engine type etc..."
                                    required
                                />
                            </div>
                            <div class="my-2">
                                <label for="model_year">Model Year</label>
                                <input
                                    type="text"
                                    name="model_year"
                                    class="form-control"
                                    placeholder="eg.2022.25..."
                                    required
                                />
                            </div>
                            <div class="my-2">
                                <label for="image">Select Image</label>
                                <input
                                    type="file"
                                    name="image"
                                    class="form-control"
                                    required
                                />
                            </div>
                        </div>
                        <div class="modal-footer bg-primary">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                            >
                                Close
                            </button>
                            <button
                                type="submit"
                                id="add_vehicle_btn"
                                class="btn btn-primary"
                            >
                                Add Vehicle
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- add new vehicle modal end --}}

        {{-- edit vehicle modal start --}}
        <div
            class="modal fade"
            id="editVehicleModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            data-bs-backdrop="static"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Edit Vehicle
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <form
                        action="#"
                        method="POST"
                        id="edit_vehicle_form"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <input type="hidden" name="veh_id" id="veh_id" />
                        <input type="hidden" name="veh_image" id="veh_image" />
                        <div class="modal-body p-4 bg-light">
                            <div class="row">
                                <div class="col-lg">
                                    <label for="make">First Name</label>
                                    <input
                                        type="text"
                                        name="make"
                                        id="make"
                                        class="form-control"
                                        placeholder="Make"
                                        required
                                    />
                                </div>
                                <div class="col-lg">
                                    <label for="model_name">Last Name</label>
                                    <input
                                        type="text"
                                        name="model_name"
                                        id="model_name"
                                        class="form-control"
                                        placeholder="Model Name"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="my-2">
                                <label for="version">E-mail</label>
                                <input
                                    type="text"
                                    name="version"
                                    id="version"
                                    class="form-control"
                                    placeholder="Version"
                                    required
                                />
                            </div>
                            <div class="my-2">
                                <label for="fuel">E-mail</label>
                                <input
                                    type="text"
                                    name="fuel"
                                    id="fuel"
                                    class="form-control"
                                    placeholder="Fuel Type"
                                    required
                                />
                            </div>
                            <div class="my-2">
                                <label for="powertrain">Phone</label>
                                <input
                                    type="text"
                                    name="powertrain"
                                    id="powertrain"
                                    class="form-control"
                                    placeholder="Powertrain"
                                    required
                                />
                            </div>
                            <div class="my-2">
                                <label for="model_year">Post</label>
                                <input
                                    type="text"
                                    name="model_year"
                                    id="model_year"
                                    class="form-control"
                                    placeholder="e.i.2022.50..."
                                    required
                                />
                            </div>
                            <div class="my-2">
                                <label for="image">Select Avatar</label>
                                <input
                                    type="file"
                                    name="image"
                                    class="form-control"
                                />
                            </div>
                            <div class="mt-2" id="image"></div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                            >
                                Close
                            </button>
                            <button
                                type="submit"
                                id="edit_vehicle_btn"
                                class="btn btn-success"
                            >
                                Update Vehicle
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- edit vehicle modal end --}}

        <div class="container">
            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="card new-shad border-dark">
                        <div
                            class="card-header bg-primary d-flex justify-content-between align-items-center"
                        >
                            <h3 class="text-grey">Manage Vehicles</h3>
                            <button
                                type="button"
                                class="btn btn-dark btn-border-dark"
                                data-bs-toggle="modal"
                                data-bs-target="#addVehicleModal"
                            >
                                <i class="bi-plus-circle me-2 "></i>Add New
                                Vehicle
                            </button>
                        </div>

                        <div class="card-body" id="show_all_vehicles">
                            <h1 class="text-center text-secondary my-5">
                                Loading vehicles...
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"
        ></script>
        <script
            type="text/javascript"
            src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"
        ></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // add new vehicle ajax request
            $("#add_vehicle_form").submit(function (e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#add_vehicle_btn").text("Processing...");
                $.ajax({
                    url: "{{route("store")}}",
                    method: "POST",
                    data: fd,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (res) {
                        if (res) {
                            Swal.fire(
                            'Added',
                            'Vehicle Added Successfully.',
                            'success'
                            )
                        }
                        $("#add_vehicle_btn").text('Add Vehicle');
                        $("#add_vehicle_form");
                        $("#addVehicleModal").modal('hide');
                        console.log(res);

                    },
                });
        </script>
    </body>
</html>
