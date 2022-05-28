<!DOCTYPE html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" charset="utf8" src="/js/app.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
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
                function fetchAllVehicles(){
                    $.ajax({
                        url: '{{route('fetchAll')}}',
                        method: 'GET',
                        success: function(res){
                            $("#show_all_vehicles").html(res);
                            $("#datatable").DataTable();
                        }
                    });
                }
                fetchAllVehicles();

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
                        serverSide: false,
                        contentType: false,
                        success: function(res) {
                            console.log(res);
                        }
                    })
                })
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
                            `<img src="storage/images/${response.image}"    width="100"       class="img-fluid img-thumbnail">`);
                        }
                    });
                });
        </script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/fh-3.2.3/datatables.min.js"></script>
</html>
