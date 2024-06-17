<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="author" content="">
    <title>Cars List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <style type="text/css">
        table th {
            font-size: 12px !important;
            padding: 12px !important;
            color: black;
        }

        table tbody td {
            font-size: 12px !important;
            padding: 12px !important;
            color: black;
        }

        .dt-buttons {
            float: left !important;
            padding-bottom: 12px;
        }
    </style>

    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">

                <section class="list-group-navigation">
                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 mb-1">
                                            <h5 class="float-left"><b>Cars List</b></h5>
                                            <div class="float-right ml-2">
                                                <a id="add_car" href="<?php echo e(route('admin.add_new_car')); ?>" class="btn btn-sm btn-primary">Add New Car</a>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table id="car_data_table" class="table table-striped table-bordered w-100" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Car</th>
                                                            <th>Car Model</th>
                                                            <th>Vehicle ID No.</th>
                                                            <th>Engine Type</th>
                                                            <th>Transmission</th>
                                                            <th>Body Type</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            </div>
        </div>
    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>



    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    </body>
    <!-- END: Body-->
    <script>
        $(document).ready(function() {

            $("#search-btn").on("click", function(evt) {
                evt.preventDefault();
                var state_filter = $("#state_filter").val();
                carDataTable(state_filter);
            });

            carDataTable();

            function carDataTable(state_filter = '') {
                var i = 1;
                $('#car_data_table').DataTable().clear().destroy();

                $("#car_data_table").DataTable({
                    serverSide: true,
                    processing: true,
                    searching: true,
                    dom: "<'row' <'col-12 mb-1' l>> Bfrtip",
                    "aLengthMenu": [
                        [25, 50, 100, 200, 300, 400, 500, 1000, -1],
                        [25, 50, 100, 200, 300, 400, 500, 1000, "All"]
                    ],
                    "iDisplayLength": 25,
                    buttons: [{
                            text: '<i class="bx bx-file"></i> CSV',
                            className: 'btn-success btn btn-sm mb-0',
                            attr: {
                                id: 'csv'
                            },
                            extend: "csv",
                            filename: 'carList',
                            exportOptions: {
                                columns: ":visible",
                                columns: [0, 1, 2, 3]
                            },
                        },
                        {
                            text: '<i class="bx bx-printer"></i> Print',
                            className: 'btn-warning btn btn-sm mb-0',
                            extend: "print",
                            attr: {
                                id: 'print'
                            },
                            exportOptions: {
                                columns: ":visible",
                                columns: [0, 1, 2, 3]
                            },
                        },
                        {
                            text: '<i class="bx bxs-file-pdf"></i> PDF',
                            className: 'btn-danger btn btn-sm mb-0',
                            extend: "pdfHtml5",
                            exportOptions: {
                                columns: ":visible",
                                columns: [0, 1, 2, 3]
                            },
                            attr: {
                                id: 'pdf'
                            },
                            filename: 'carList',
                        },
                        {
                            text: '<i class="bx bx-copy-alt"></i> Copy',
                            className: 'btn-info btn btn-sm mb-0',
                            extend: "copyHtml5",
                            exportOptions: {
                                columns: ":visible",
                                columns: [0, 1, 2, 3]
                            },
                            attr: {
                                id: 'copy'
                            },
                        },
                    ],
                    order: [],

                    ajax: {
                        url: "<?php echo e(route('admin.carDataTable')); ?>",
                        type: "GET",
                        data: {
                            state_filter: state_filter,
                        }
                    },

                    columns: [{
                            "render": function(data, type, row, meta) {
                                var pageNumber = Math.floor(meta.row / meta.settings
                                    ._iDisplayLength) + 1;
                                var i = meta.settings._iDisplayStart + meta.row + 1;
                                return i;
                            }
                        },
                        {
                            data: 'car_make'
                        },
                        {
                            data: 'car_model'
                        },
                        {
                            data: 'vin'
                        },
                        {
                            data: 'engine_type'
                        },
                        {
                            data: 'transmission'
                        },
                        {
                            data: 'body_type'
                        },
                        {
                            data: 'status'
                        },
                        {
                            data: 'actions'
                        },
                    ]
                });
            }

            $(document).on('click', '.deactivate-car-btn', function() {
                let id = $(this).data('id');

                $.confirm({
                    title: 'Confirm!',
                    type: 'red',
                    content: 'Are you sure want to deactivate this car ?',
                    buttons: {
                        yes: function() {
                            $.get("<?php echo e(route('admin.car_deactivate')); ?>", {
                                id
                            }, function(data) {
                                if (data.status == true) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: data.message
                                    });
                                    carDataTable();
                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: data.message
                                    });
                                }
                            }, 'json');
                        },
                        no: function() {}
                    }
                });
            });


            $(document).on('click', '.activate-car-btn', function() {
                let id = $(this).data('id');

                $.confirm({
                    title: 'Confirm!',
                    type: 'red',
                    content: 'Are you sure want to activate this car ?',
                    buttons: {
                        yes: function() {
                            $.get("<?php echo e(route('admin.car_activate')); ?>", {
                                id
                            }, function(data) {
                                if (data.status == true) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: data.message
                                    });
                                    carDataTable();
                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: data.message
                                    });
                                }
                            }, 'json');
                        },
                        no: function() {}
                    }
                });
            });


            $(document).on('click', '.car-delt-btn', function() {
                let id = $(this).data('id');

                $.confirm({
                    title: 'Confirm!',
                    type: 'red',
                    content: 'Are you sure want to Delete this car ?',
                    buttons: {
                        yes: function() {
                            $.get("<?php echo e(route('admin.car_delete')); ?>", {
                                id
                            }, function(data) {
                                if (data.status == true) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: data.message
                                    });
                                    carDataTable();
                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: data.message
                                    });
                                }
                            }, 'json');
                        },
                        no: function() {}
                    }
                });
            });


        });
    </script>

</html><?php /**PATH C:\xampp\htdocs\CarRentalSystem\resources\views/admin/cars/index.blade.php ENDPATH**/ ?>