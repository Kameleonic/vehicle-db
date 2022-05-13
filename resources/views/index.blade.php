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
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>CRUD Application made using Laravel 8</title>
    </head>
    <body>
        <input type="hidden" name="csrf-token" value="CIwNZNlR4XbisJF39I8yWnWX9wX4WFoz" />

        {{-- add new vehicle modal start --}}
        <div
            class="modal fade"
            id="addVehicleModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            data-bs-backdrop="static"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
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
                                        placeholder="Modal name..."
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
                                    name="model_yearyear"
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
                        <input type="hidden" name="emp_id" id="emp_id" />
                        <input
                            type="hidden"
                            name="emp_avatar"
                            id="emp_avatar"
                        />
                        <div class="modal-body p-4 bg-light">
                            <div class="row">
                                <div class="col-lg">
                                    <label for="fname">First Name</label>
                                    <input
                                        type="text"
                                        name="fname"
                                        id="fname"
                                        class="form-control"
                                        placeholder="First Name"
                                        required
                                    />
                                </div>
                                <div class="col-lg">
                                    <label for="lname">Last Name</label>
                                    <input
                                        type="text"
                                        name="lname"
                                        id="lname"
                                        class="form-control"
                                        placeholder="Last Name"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="my-2">
                                <label for="email">E-mail</label>
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control"
                                    placeholder="E-mail"
                                    required
                                />
                            </div>
                            <div class="my-2">
                                <label for="phone">Phone</label>
                                <input
                                    type="tel"
                                    name="phone"
                                    id="phone"
                                    class="form-control"
                                    placeholder="Phone"
                                    required
                                />
                            </div>
                            <div class="my-2">
                                <label for="post">Post</label>
                                <input
                                    type="text"
                                    name="post"
                                    id="put"
                                    class="form-control"
                                    placeholder="put"
                                    required
                                />
                            </div>
                            <div class="my-2">
                                <label for="avatar">Select Avatar</label>
                                <input
                                    type="file"
                                    name="avatar"
                                    class="form-control"
                                />
                            </div>
                            <div class="mt-2" id="avatar"></div>
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
                    <div class="card shadow">
                        <div
                            class="card-header bg-danger d-flex justify-content-between align-items-center"
                        >
                            <h3 class="text-light">Manage Vehicles</h3>
                            <button
                                class="btn btn-light"
                                data-bs-toggle="modal"
                                data-bs-target="#addVehicleModal"
                            >
                                <i class="bi-plus-circle me-2"></i>Add New
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
                    url: '{{ route('store') }}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success:function(res) {
                        console.log(res);
                    }
                });
            })
        </script>
        <script>
        </script>
    </body>
</html>
