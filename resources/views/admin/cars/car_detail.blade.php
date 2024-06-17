<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Car Detail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    @include('layouts.header')
    <style type="text/css">
    /* .p-1 {
    padding:0.7rem !important;
    background-color:#190e27;
    color:white;
    } */

    .autocomplete-items div {
    padding: 10px;
    cursor: pointer;
    background-color: #fff; 
    border-bottom: 1px solid #d4d4d4; 
    }

    /*when hovering an item:*/
    .autocomplete-items div:hover {
    background-color: #e9e9e9; 
    }

    /*when navigating through the items using the arrow keys:*/
    .autocomplete-active {
    background-color: DodgerBlue !important; 
    color: #ffffff; 
    }

    #selected_pincodes + span .select2-selection {
    border: none;
    }

    </style>

<!-- BEGIN: Content-->

<div class="app-content content mt-2">
  <div class="content-overlay"></div>
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <!-- Dashboard Ecommerce Starts -->          
      <section class="list-group-navigation">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header text-center">
                <h3><b>Car Details</b></h3>
              </div>
              <div class="card-body">
              <div class="row">
                <div class="col-lg-12 mb-5">
                    <h3 class="display-4 text-uppercase mb-5">{{$car->car_make}} - {{$car->car_model}}</h3>
                    <div class="row mx-n2 mb-3">
                        <div class="col-md-3 col-6 px-2 pb-2">
                            <img class="img-fluid w-100" src="{{ url('uploads/main_image/'.$car->main_image) }}" alt="">
                        </div>
                        @foreach($images as $image)
                        <div class="col-md-3 col-6 px-2 pb-2">
                            <img class="img-fluid w-100 h-100" src="{{ url('uploads/images/'.$image->image) }}" alt="">
                        </div>
                        @endforeach
                    </div>
                    <p>{{ $car->description}}</p>
                    <h5 class="border-bottom border-5 p-1">Basic Details</h5>
                    <div class="row">
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>Car Make:</b> {{$car->car_make}}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>Car Model:</b> {{$car->car_model}}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>Year:</b> {{$car->year}}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>Vehicle ID No.:</b> {{$car->vin}}</span>
                        </div>
                    </div>
                    <h5 class="border-bottom p-1">Specification Details</h5>
                    <div class="row">
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>Engine Type:</b> {{$car->engine_type}}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>Transmission:</b> {{$car->transmission}}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>Body Type:</b> {{$car->body_type}}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>Fuel Type:</b> {{$car->fuel_type}}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>Color:</b> {{$car->color}}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>Mileage:</b> {{$car->mileage}}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>Seating Capacity:</b> {{$car->seating_capacity}}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>Number of Doors:</b> {{$car->no_of_doors}}</span>
                        </div>
                    </div>
                    <h5 class="border-bottom p-1">Rental Details</h5>
                    <div class="row">
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>Rental Price per Hour:</b> {{$car->rent_price}}</span>
                        </div>

                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>Availability Status:</b> {{$car->availability_status}}</span>
                        </div>
                    </div>
                    <h5 class="border-bottom p-1">Additional Details</h5>
                    <div class="row">
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>Air Conditioning:</b> {{$car->air_conditioning}}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>Bluetooth:</b> {{$car->bluetooth}}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>USB Port:</b> {{$car->usb_port}}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>Heated Seats:</b> {{$car->heated_seats}}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>Sunroof:</b> {{$car->sunroof}}</span>
                        </div>
                    </div>
                    <h5 class="border-bottom p-1">Insurance and Documents Details</h5>
                    <div class="row">
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>Insurance No:</b> {{$car->insurance_policy_number}}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>InsuranceExpiry:</b> {{$car->insurance_expiry_date}}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>Registration No:</b> {{$car->registration_number}}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="bx bx-chevrons-right text-primary "></i>
                            <span><b>RegistrationExpiry:</b> {{$car->registration_expiry_date}}</span>
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

    </div>
  </div>
</div>

@include('layouts.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  </body>
  <!-- END: Body-->
<script>

  $(document).ready(function(){


  });
  
</script>
</html>