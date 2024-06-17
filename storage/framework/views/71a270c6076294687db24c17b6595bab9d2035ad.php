<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css ')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css ')); ?>">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>

<body>
    <?php echo $__env->make('user.userAuthHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="">

        <!-- <div class="container"> -->
        <div class="p-4 bg-light">
            <div class="row">
                <?php echo $__env->make('user.sideDetails', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="col-12 col-lg-8 col-xl-9">
                    <div class="card widget-card border-light shadow-sm">
                        <div class="card-body p-4">
                            <div class="tab-content" id="profileTabContent">
                                <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
                                    <h5 class="mb-3">My Booking</h5>

                                    <div class="row mb-3">
                                        <div class="col-12">
                                            Latest Bookings
                                            <div class="table-responsive mt-2">
                                                <table id="booking_data_table" class="table table-striped table-bordered w-100" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Booking ID</th>
                                                            <th>Car</th>
                                                            <th>Pickup date time</th>
                                                            <th>Drop date time</th>
                                                            <th>Hours</th>
                                                            <th>Rent Price</th>
                                                            <th>Total Amount</th>
                                                            <th>Payment Status</th>
                                                            <th>Booking Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                                <!-- datatable ends -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="booking_details_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="padding: 0.6rem 1rem;">
                        <h4 class="modal-title" id="booking_details_modal_heading">Booking Details</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="container">
                        <div class="modal-body pb-0">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th colspan="4" scope="col">Booked Car Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Car Make</th>
                                        <td id="car_make"></td>
                                        <th>Car Model</th>
                                        <td id="car_model"></td>
                                    </tr>
                                    <tr>
                                        <th>Year</th>
                                        <td id="year"></td>
                                        <th>Vehicle ID No</th>
                                        <td id="vin"></td>
                                    </tr>
                                    <tr>
                                        <th>Engine Type</th>
                                        <td id="engine_type"></td>
                                        <th>Transmission</th>
                                        <td id="transmission"></td>
                                    </tr>
                                    <tr>
                                        <th>Body Type</th>
                                        <td id="body_type"></td>
                                        <th>Fuel Type</th>
                                        <td id="fuel_type"></td>
                                    </tr>
                                    <tr>
                                        <th>Color</th>
                                        <td id="color"></td>
                                        <th>Mileage</th>
                                        <td id="mileage"></td>
                                    </tr>
                                    <tr>
                                        <th>Seating Capacity</th>
                                        <td id="seating_capacity"></td>
                                        <th>Number of Doors</th>
                                        <td id="no_of_doors"></td>
                                    </tr>
                                    <tr>
                                        <th>Rental Price per Hour</th>
                                        <td id="rent_price"></td>
                                        <th>Availability Status</th>
                                        <td id="availability_status"></td>
                                    </tr>
                                    <tr>
                                        <th>Air Conditioning</th>
                                        <td id="air_conditioning"></td>
                                        <th>Bluetooth</th>
                                        <td id="bluetooth"></td>
                                    </tr>
                                    <tr>
                                        <th>USB Port</th>
                                        <td id="usb_port"></td>
                                        <th>Heated Seats</th>
                                        <td id="heated_seats"></td>
                                    </tr>
                                    <tr>
                                        <th>Sunroof</th>
                                        <td id="sunroof"></td>
                                        <th>Insurance No</th>
                                        <td id="insurance_policy_number"></td>
                                    </tr>
                                    <tr>
                                        <th>Insurance Expiry</th>
                                        <td id="insurance_expiry_date"></td>
                                        <th>Registration No</th>
                                        <td id="registration_number"></td>
                                    </tr>
                                    <tr>
                                        <th>Registration Expiry</th>
                                        <td id="registration_expiry_date"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="4" scope="col">Booking Details</th>
                                        </tr>
                                    </thead>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <th>Booking ID</th>
                                        <td id="booking_id"></td>
                                        <th></th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Pickup Date</th>
                                        <td id="pickup_date"></td>
                                        <th>Pickup Time</th>
                                        <td id="pickup_time"></td>
                                    </tr>
                                    <tr>
                                        <th>Drop Date</th>
                                        <td id="drop_date"></td>
                                        <th>Drop Time</th>
                                        <td id="drop_time"></td>
                                    </tr>
                                    <tr>
                                        <th>Hours</th>
                                        <td id="hours"></td>
                                        <th>Rent Price</th>
                                        <td id="booking_rent_price"></td>
                                    </tr>
                                    <tr>
                                        <th>Number of Person</th>
                                        <td id="person_number"></td>
                                        <th>Total amount</th>
                                        <td id="total_amount"></td>
                                    </tr>
                                    <tr>
                                        <th>Payment status</th>
                                        <td id="payment_status" colspan="3"></td>
                                        <!-- <th></th> -->
                                        <!-- <td></td> -->
                                    </tr>
                                </tbody>
                            </table>
                            <div class="form-group mb-2 float-right">
                                <button class="btn btn-danger" id="cancel-btn" class="close" data-bs-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit_booking_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="padding: 0.6rem 1rem;">
                        <h4 class="modal-title" id="edit_booking_modal_heading">Edit Booking</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="container">
                        <div class="modal-body pb-0">
                            <form id="edit_booking_form" style="margin-bottom: 50px;" enctype="multipart/form">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="booking_id" id="edit_booking_id">
                                <input type="hidden" name="car_id" id="edit_car_id">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="pickup_date1">Pickup Date<span class="text-danger">*</span></label>
                                            <input type="date" name="pickup_date" id="edit_pickup_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="text">Pickup Time<span class="text-danger">*</span></label>
                                            <input type="time" name="pickup_time" id="edit_pickup_time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="text">Drop Date<span class="text-danger">*</span></label>
                                            <input type="date" name="drop_date" id="edit_drop_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="text">Drop Time<span class="text-danger">*</span></label>
                                            <input type="time" name="drop_time" id="edit_drop_time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="text">Hours<span class="text-danger">*</span></label>
                                            <input type="number" name="hours" id="edit_hours" readonly class="form-control" placeholder="Hours">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="text">Rent Price <span class="text-danger">*</span></label>
                                            <input type="number" name="rent_price" id="edit_rent_price" readonly class="form-control" placeholder="Rent Price">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="text">Number of Persons <span class="text-danger">*</span></label>
                                            <input type="number" name="person_number" id="edit_person_number" class="form-control" placeholder="Enter Number of Persons">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2 float-right">
                                    <div class="form-group ">
                                        <button class="btn btn-success update_booking" type="button">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>
    bookingDataTable();

    function bookingDataTable() {
        $('#booking_data_table').DataTable().clear().destroy();

        $("#booking_data_table").DataTable({
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
                url: "<?php echo e(route('bookingDataTable')); ?>",
                type: "GET",
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
                    data: 'booking_id'
                },
                {
                    data: 'car'
                },
                {
                    data: 'pickup_date_time'
                },
                {
                    data: 'drop_date_time'
                },
                {
                    data: 'hours'
                },
                {
                    data: 'rent_price'
                },
                {
                    data: 'total_amount'
                },
                {
                    data: 'payment_status'
                },
                {
                    data: 'booking_status'
                },
                {
                    data: 'actions'
                },
            ]
        });
    }

    $(document).ready(function() {

        $(document).on('click', '.booking_details', function() {
            let id = $(this).data("value");
            $.get("<?php echo e(route('get_booking_detail')); ?>", {
                id
            }, function(data) {
                console.log(data);
                if (data != "") {
                    $("#car_make").text(data.car_make);
                    $("#car_model").text(data.car_model);
                    $("#year").text(data.year);
                    $("#vin").text(data.vin);
                    $("#engine_type").text(data.engine_type);
                    $("#transmission").text(data.transmission);
                    $("#body_type").text(data.body_type);
                    $("#fuel_type").text(data.fuel_type);
                    $("#color").text(data.color);
                    $("#mileage").text(data.mileage);
                    $("#seating_capacity").text(data.seating_capacity);
                    $("#no_of_doors").text(data.no_of_doors);
                    $("#rent_price").text(data.rent_price);
                    $("#availability_status").text(data.availability_status);
                    $("#air_conditioning").text(data.air_conditioning);
                    $("#bluetooth").text(data.bluetooth);
                    $("#usb_port").text(data.usb_port);
                    $("#heated_seats").text(data.heated_seats);
                    $("#sunroof").text(data.sunroof);
                    $("#insurance_policy_number").text(data.insurance_policy_number);
                    $("#insurance_expiry_date").text(data.insurance_expiry_date);
                    $("#registration_number").text(data.registration_number);
                    $("#registration_expiry_date").text(data.registration_expiry_date);
                    $("#booking_id").text(data.booking_id);
                    $("#pickup_date").text(data.pickup_date);
                    $("#pickup_time").text(data.pickup_time);
                    $("#drop_date").text(data.drop_date);
                    $("#drop_time").text(data.drop_time);
                    $("#hours").text(data.hours);
                    $("#booking_rent_price").text(data.booking_rent_price);
                    $("#person_number").text(data.person_number);
                    $("#total_amount").text(data.total_amount);
                    $("#payment_status").text(data.payment_status);
                }
            }, "json");
            $("#booking_details_modal").modal("show");
        });

        $(document).on('click', '.edit_booking', function() {
            let id = $(this).data("value");
            $.get("<?php echo e(route('get_booking_detail')); ?>", {
                id
            }, function(data) {
                if (data != "") {
                    $("#edit_booking_id").val(data.booking_id);
                    $("#edit_car_id").val(data.car_id);
                    $("#edit_pickup_date").val(data.pickup_date);
                    $("#edit_pickup_time").val(data.pickup_time);
                    $("#edit_drop_date").val(data.drop_date);
                    $("#edit_drop_time").val(data.drop_time);
                    $("#edit_hours").val(data.hours);
                    $("#edit_rent_price").val(data.booking_rent_price);
                    $("#edit_person_number").val(data.person_number);
                }
            }, "json");
            $("#edit_booking_modal").modal("show");
        });

        $(document).on('change', '#edit_pickup_date, #edit_pickup_time, #edit_drop_date, #edit_drop_time', function() {
            let car_id = $('#edit_car_id').val();
            let pickup_date = $('#edit_pickup_date').val();
            let pickup_time = $('#edit_pickup_time').val();
            let drop_date = $('#edit_drop_date').val();
            let drop_time = $('#edit_drop_time').val();
            if (pickup_date != '' && pickup_time != '' && drop_date != '' && drop_time != '') {
                $.get("<?php echo e(route('get_price')); ?>", {
                    car_id,
                    pickup_date,
                    pickup_time,
                    drop_date,
                    drop_time
                }, function(data) {
                    if (data.status == true) {
                        $('#edit_hours').val(data.hours);
                        $('#edit_rent_price').val(data.price);
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: data.message
                        });
                    }
                }, "json");
            }
        });

        $(document).on("click", ".update_booking", function(event) {
            event.preventDefault();
            let myForm = document.getElementById('edit_booking_form');
            var formData = new FormData(myForm);
            formData.append('_token', '<?php echo e(csrf_token()); ?>');
            $(this).attr('disabled', true);
            $.ajax({
                type: "post",
                data: formData,
                url: "<?php echo e(route('add_booking')); ?>",
                cache: false,
                contentType: false,
                processData: false,
                success: function(result) {
                    if (result.status == true) {
                        Swal.fire({
                            title: "Success",
                            text: result.message,
                            icon: "success",
                            button: "OK",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "<?php echo e(route('my_bookings')); ?>";
                            }
                        });
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: result.message,
                            icon: "error",
                            button: "OK",
                        });
                        $('.update_booking').prop('disabled', false);
                    }
                }
            });
        });

    });
</script>

</html><?php /**PATH C:\xampp\htdocs\CarRentalSystem\resources\views/user/my_bookings.blade.php ENDPATH**/ ?>