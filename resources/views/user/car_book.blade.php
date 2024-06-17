<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Car Book</title>
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
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css ') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css ') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<style>
    .image-container {
        overflow: hidden;
        position: relative;
    }

    .image-container img {
        transition: transform 0.3s ease;
    }

    .image-container img:hover {
        transform: scale(1.3);
        /* Adjust the scale as needed */
    }
</style>

<body>
    @include('user.userAuthHeader')
    <section class="">

        <!-- <div class="container"> -->
        <div class="p-4 bg-light">
            <div class="row">
                @include('user.sideDetails')

                <div class="col-12 col-lg-8 col-xl-9">
                    <div class="card widget-card border-light shadow-sm">
                        <div class="card-body p-4">
                            <div class="tab-content" id="profileTabContent">
                                <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
                                    <h5 class="mb-3">New Booking</h5>
                                    <div class="row">
                                        <h3 class="display-4 text-uppercase mb-5 pl-3">{{$car->car_make}} - {{$car->car_model}}</h3>
                                        <div class="col-lg-12 mb-5 see_details">
                                            <div class="row mx-n2 mb-3">
                                                <div class="col-md-3 col-6 px-2 pb-2 image-container">
                                                    <img class="img-fluid w-100" src="{{ url('uploads/main_image/'.$car->main_image) }}" alt="">
                                                </div>
                                                @foreach($images as $image)
                                                <div class="col-md-3 col-6 px-2 pb-2 image-container">
                                                    <img class="img-fluid w-100 h-100" style="height:50px; width:50px;" src="{{ url('uploads/images/'.$image->image) }}" alt="">
                                                </div>
                                                @endforeach
                                            </div>
                                            <p>{{ $car->description}}</p>
                                            <div class="row pt-2">
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>Car Make:</b> {{$car->car_make}}</span>
                                                </div>
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>Car Model:</b> {{$car->car_model}}</span>
                                                </div>
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>Year:</b> {{$car->year}}</span>
                                                </div>
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>Vehicle ID No.:</b> {{$car->vin}}</span>
                                                </div>
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>Engine Type:</b> {{$car->engine_type}}</span>
                                                </div>
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>Transmission:</b> {{$car->transmission}}</span>
                                                </div>
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>Body Type:</b> {{$car->body_type}}</span>
                                                </div>
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>Fuel Type:</b> {{$car->fuel_type}}</span>
                                                </div>
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>Color:</b> {{$car->color}}</span>
                                                </div>
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>Mileage:</b> {{$car->mileage}}</span>
                                                </div>
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>Seating Capacity:</b> {{$car->seating_capacity}}</span>
                                                </div>
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>Number of Doors:</b> {{$car->no_of_doors}}</span>
                                                </div>
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>Rental Price per Hour:</b> {{$car->rent_price}}</span>
                                                </div>

                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>Availability Status:</b> {{$car->availability_status}}</span>
                                                </div>

                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>Air Conditioning:</b> {{$car->air_conditioning}}</span>
                                                </div>
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>Bluetooth:</b> {{$car->bluetooth}}</span>
                                                </div>
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>USB Port:</b> {{$car->usb_port}}</span>
                                                </div>
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>Heated Seats:</b> {{$car->heated_seats}}</span>
                                                </div>
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>Sunroof:</b> {{$car->sunroof}}</span>
                                                </div>
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>Insurance No:</b> {{$car->insurance_policy_number}}</span>
                                                </div>
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>InsuranceExpiry:</b> {{$car->insurance_expiry_date}}</span>
                                                </div>
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>Registration No:</b> {{$car->registration_number}}</span>
                                                </div>
                                                <div class="col-md-4 col-6 mb-2">
                                                    <i class="bx bx-car text-primary mr-2"></i>
                                                    <span><b>RegistrationExpiry:</b> {{$car->registration_expiry_date}}</span>
                                                </div>

                                            </div>
                                            <div class="form-group mt-5">
                                                <button class="btn btn-primary btn-block show_form" type="button" style="height: 50px;">Book Now</button>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-5 book_now_form" hidden>
                                            <div class="bg-secondary p-5">
                                                <h3 class="text-primary text-center mb-4">Book Now</h3>
                                                <form id="book_car_form">
                                                    @csrf
                                                    <input type="hidden" name="car_id" id="car_id" value="{{$car->id}}">
                                                    <div class="form-group">
                                                        <div class="date" id="date1" data-target-input="nearest">
                                                            <label class="form-control-label text-white">Pickup Date<span class="text-danger">*</span></label>
                                                            <input type="date" class="form-control p-4 datetimepicker-input" placeholder="Pickup Date" data-target="#date1" data-toggle="datetimepicker" name="pickup_date" id="pickup_date" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="time" id="time1" data-target-input="nearest">
                                                            <label class="form-control-label text-white">Pickup Time<span class="text-danger">*</span></label>
                                                            <input type="time" class="form-control p-4 datetimepicker-input" placeholder="Pickup Time" data-target="#time1" data-toggle="datetimepicker" name="pickup_time" id="pickup_time" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="date" id="date1" data-target-input="nearest">
                                                            <label class="form-control-label text-white">Drop Date<span class="text-danger">*</span></label>
                                                            <input type="date" class="form-control p-4 datetimepicker-input" placeholder="Drop Date" data-target="#date1" data-toggle="datetimepicker" name="drop_date" id="drop_date" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="time" id="time1" data-target-input="nearest">
                                                            <label class="form-control-label text-white">Drop Time<span class="text-danger">*</span></label>
                                                            <input type="time" class="form-control p-4 datetimepicker-input" placeholder="Drop Time" data-target="#time1" data-toggle="datetimepicker" name="drop_time" id="drop_time" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="time" id="time1" data-target-input="nearest">
                                                            <label class="form-control-label text-white">Hours<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Hours" data-target="#time1" data-toggle="datetimepicker" name="hours" id="hours" readonly />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="time" id="time1" data-target-input="nearest">
                                                            <label class="form-control-label text-white">Rent Price<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Rent Price" data-target="#time1" data-toggle="datetimepicker" name="rent_price" id="rent_price" readonly />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-control-label text-white">Number of Persons<span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control p-4 " placeholder="Enter Number of Persons" name="person_number" id="person_number" />
                                                    </div>
                                                    <div class="form-group mb-0 mt-2">
                                                        <button class="btn btn-primary btn-block book_car_button" type="button" style="height: 50px;">Book</button>
                                                    </div>
                                                </form>
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

    </section>
    @include('layouts.footer')
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</body>

<script>
    $(document).ready(function() {
        $(document).on('click', '.show_form', function() {
            $('.see_details').attr('hidden', true);
            $('.book_now_form').removeAttr('hidden');
        });

        $(document).on('change', '#pickup_date, #pickup_time, #drop_date, #drop_time', function() {
            let car_id = $('#car_id').val();
            let pickup_date = $('#pickup_date').val();
            let pickup_time = $('#pickup_time').val();
            let drop_date = $('#drop_date').val();
            let drop_time = $('#drop_time').val();
            if (pickup_date != '' && pickup_time != '' && drop_date != '' && drop_time != '') {

                $.get("{{ route('get_price') }}", {
                    car_id,
                    pickup_date,
                    pickup_time,
                    drop_date,
                    drop_time
                }, function(data) {
                    if (data.status == true) {
                        $('#hours').val(data.hours);
                        $('#rent_price').val(data.price);
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: data.message
                        });
                    }
                }, "json");
            }
        });

        $(document).on("click", ".book_car_button", function(event) {
            event.preventDefault();
            let myForm = document.getElementById('book_car_form');
            var formData = new FormData(myForm);
            formData.append('_token', '{{ csrf_token() }}');
            $(this).attr('disabled', true);
            $.ajax({
                type: "post",
                data: formData,
                url: "{{ route('add_booking') }}",
                cache: false,
                contentType: false,
                processData: false,
                success: function(result) {
                    if (result.status == true) {
                        Swal.fire({
                            title: "Car booked successfully",
                            text: result.message,
                            icon: "success",
                            button: "OK",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('my_bookings') }}";
                            }
                        });
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: result.message,
                            icon: "error",
                            button: "OK",
                        });
                        $('.book_car_button').prop('disabled', false);
                    }
                }
            });
        });

    });
</script>

</html>