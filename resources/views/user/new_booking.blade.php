<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>New Booking</title>
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

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css ') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css ') }}">
    
  </head>

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

                @foreach($cars as $car)
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="rent-item mb-4">
                        <img class="img-fluid mb-4" src="{{ url('uploads/main_image/'.$car->main_image) }}" alt="">
                        <h4 class="text-uppercase mb-4">{{$car->car_make}}</h4>
                        <div class="d-flex justify-content-center mb-4">
                            <div class="px-2">
                                <i class="fa fa-car text-primary mr-1"></i>
                                <span>{{$car->year}}</span>
                            </div>
                            <div class="px-2 border-left border-right">
                                <i class="fa fa-cogs text-primary mr-1"></i>
                                <span>{{$car->transmission}}</span>
                            </div>
                            <div class="px-2">
                                <i class="fa fa-road text-primary mr-1"></i>
                                <span>{{$car->mileage}}</span>
                            </div>
                        </div>
                        <a class="btn btn-primary px-3" href="{{ route('car_book', ['id' => $car->id]) }}">Rs. {{ $car->rent_price }}/Hour</a>

                    </div>
                </div>
                @endforeach
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
</body>

<script>

</script>

</html>