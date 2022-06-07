
<!DOCTYPE html>
@include('layouts.head')

        <div class="pos-fnpm run hot-t header" >

            @include('includes.header')

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
            <div class="modal-dialog modal-dialog-centered">
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
                                <label for="trans">Transmission</label>
                                <input
                                    type="text"
                                    name="trans"
                                    class="form-control"
                                    placeholder="Manual..Auto.."
                                    required
                                />
                            </div>
                            <div class="my-2">
                                <label for="fuel">Fuel Type</label>
                                <input
                                    type="text"
                                    name="fuel"
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
                                <label for="img">Select Image</label>
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
            aria-labelledby="editVehicleModal"
            data-bs-backdrop="static"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
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
                        <input type="hidden" name="id" id="veh_id" />
                        <input type="hidden" name="image" id="veh_image" />
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="col-lg">
                                    <label for="make">Make</label>
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
                                    <label for="model_name">Model</label>
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
                                <label for="version">Version</label>
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
                                <label for="trans">Transmission</label>
                                <input
                                    type="text"
                                    name="trans"
                                    id="trans"
                                    class="form-control"
                                    placeholder="Auto..Manual.."
                                    required
                                />
                            </div>
                            <div class="my-2">
                                <label for="fuel">Fuel</label>
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
                                <label for="powertrain">Powertrain</label>
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
                                <label for="model_year">Model Year</label>
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
                                <label for="image">Image</label>
                                <input
                                    type="file"
                                    name="image"
                                    class="form-control"
                                />
                            </div>
                            <div class="mt-2" id="image"></div>
                        </div>
                        <div class="modal-footer bg-primary">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" id="edit_vehicle_btn" class="btn btn-success">
                                Update Vehicle
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- edit vehicle modal end --}}
    <body>
        <div class="container">
            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="card new-shad border-dark">
                        <div
                            class="card-header bg-primary d-flex justify-content-between align-items-center"
                        >
                            <h3 class="tbl-ttl">Manage Vehicles</h3>

                            <button
                                type="button"
                                class="btn btn-dark"
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
    @include('includes.footer')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" charset="utf8" src="/js/app.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(function() {
                // ADD NEW VEHICLE AJAX REQUEST
                $("#add_vehicle_form").submit(function (e) {
                    e.preventDefault();
                    const fd = new FormData(this);
                    $("#add_vehicle_btn").text("Processing...");
                    $.ajax({
                        url: '{{route('store')}}',
                        method: 'POST',
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
                                fetchAllVehicles();
                            }
                            $("#add_vehicle_btn").text('Add Vehicle');
                            $("#add_vehicle_form");
                            $("#addVehicleModal").modal('hide');
                            console.log(res);

                        }
                    });
                })
                // SHOW ALL VEHICLES AJAX REQUEST

                // function fetchAllVehicles(){
                //     $.ajax({
                //         url: '{{route('fetchAll')}}',
                //         method: 'GET',
                //         success: function(res){
                //             $("#show_all_vehicles").html(res);
                //             $("#datatable").DataTable()
                //             ;
                //         }
                //     });
                // }



                // edit employee ajax request
                $(document).on('click', '.editIcon', function(e) {
                    e.preventDefault();
                    let id = $(this).attr('id');
                    $.ajax({
                        url: '{{ route('edit') }}',
                        method: 'GET',
                        data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $("#id").val(response.id);
                            $("#make").val(response.make);
                            $("#model_name").val(response.model_name);
                            $("#version").val(response.version);
                            $("#powertrain").val(response.powertrain);
                            $("#trans").val(response.trans);
                            $("#fuel").val(response.fuel);
                            $("#model_year").val(response.model_year);
                            $("#image").html(
                            `<img src="storage/images/${response.image}"    width="100" class="img-fluid img-thumbnail">`);
                        }
                    });
                });
                // UPDATE AJAX REQUEST
                $("#edit_vehicle_form").submit(function(e){
                    e.preventDefault();
                    const fd = new FormData(this);
                    $("#edit_vehicle_btn").text('Updating...');
                    $.ajax({
                        url: '{{ route('update') }}',
                        method: 'POST',
                        data: fd,
                        cache: false,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function(res) {

                            console.log(res)


                        $("#edit_vehicle_btn").text('Update Vehicle');
                        $("#edit_vehicle_form")[0].reset();
                        $("#editVehicleModal").modal('hide');
                        fetchAllVehicles();
                        }

                    });
                });

                fetchAllVehicles();

                function fetchAllVehicles(){
                    $.ajax({
                        url: '{{route('fetchAll')}}',
                        method: 'GET',
                        success: function(res){
                            $("#show_all_vehicles").html(res);
                            $("#datatable").DataTable();
                        }
                    });
                };
            });
        </script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/fh-3.2.3/datatables.min.js"></script>

    </body>
</html>
